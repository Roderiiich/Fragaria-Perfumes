<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index(Request $request)
    {
        // traer marcas y categorías para los selectores de los filtros
        $brands = Brand::all();
        $categories = Category::all();

        // constructor de la consulta base con relaciones y promedios en tiempo real
        $query = Perfume::with(['brand', 'category'])
            ->withCount('reviews as total_resenas')
            ->withAvg('reviews as calificacion_promedio', 'calificacion')
            ->withAvg('reviews as duracion_promedio', 'duracion')
            ->withAvg('reviews as proyeccion_promedio', 'proyeccion');

        // filtro buscador por nombre
        if ($request->filled('search')) {
            $query->where('nombre', 'LIKE', '%' . $request->search . '%');
        }

        // fltro por Marca
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // filtro por categoría olfativa
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // paginación de resultados
        $perfumes = $query->paginate(12);

        // retornar la vista con los datos 
        return view('perfumes.index', compact('perfumes', 'brands', 'categories'));
    }
    public function show(Perfume $perfume)
{
    // cargar relaciones y calcular estadísticas para un perfume específico
    $perfume->load(['brand', 'category', 'reviews.user']);
    $perfume->loadCount('reviews as total_resenas');
    $perfume->loadAvg('reviews as calificacion_promedio', 'calificacion');
    $perfume->loadAvg('reviews as duracion_promedio', 'duracion');
    $perfume->loadAvg('reviews as proyeccion_promedio', 'proyeccion');

    // extraer la reseña del usuario logueado (si existe)
    $myReview = null;
    if (auth()->check()) {
        $myReview = $perfume->reviews->where('user_id', auth()->id())->first();
    }

    // filtrar las reseñas de los demás usuarios
    $otherReviews = $perfume->reviews;
    if ($myReview) {
        $otherReviews = $otherReviews->where('id', '!=', $myReview->id);
    }

    return view('perfumes.show', compact('perfume', 'myReview', 'otherReviews'));
}
}