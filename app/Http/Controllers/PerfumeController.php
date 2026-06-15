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
        // 1. Traer marcas y categorías para los selectores de los filtros
        $brands = Brand::all();
        $categories = Category::all();

        // 2. Construir la consulta base con relaciones y promedios en tiempo real
        $query = Perfume::with(['brand', 'category'])
            ->withCount('reviews as total_resenas')
            ->withAvg('reviews as calificacion_promedio', 'calificacion')
            ->withAvg('reviews as duracion_promedio', 'duracion')
            ->withAvg('reviews as proyeccion_promedio', 'proyeccion');

        // Filter: Buscador por nombre
        if ($request->filled('search')) {
            $query->where('nombre', 'LIKE', '%' . $request->search . '%');
        }

        // Filter: Por Marca
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Filter: Por Categoría Olfativa
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 3. Paginación de resultados
        $perfumes = $query->paginate(12);

        // 4. Retornar la vista con los datos correspondientes
        return view('perfumes.index', compact('perfumes', 'brands', 'categories'));
    }
    public function show(Perfume $perfume)
{
    // 1. Cargar relaciones y calcular estadísticas para este perfume específico
    $perfume->load(['brand', 'category', 'reviews.user']);
    $perfume->loadCount('reviews as total_resenas');
    $perfume->loadAvg('reviews as calificacion_promedio', 'calificacion');
    $perfume->loadAvg('reviews as duracion_promedio', 'duracion');
    $perfume->loadAvg('reviews as proyeccion_promedio', 'proyeccion');

    // 2. Extraer la reseña del usuario logueado (si existe)
    $myReview = null;
    if (auth()->check()) {
        $myReview = $perfume->reviews->where('user_id', auth()->id())->first();
    }

    // 3. Filtrar las reseñas de los demás usuarios
    $otherReviews = $perfume->reviews;
    if ($myReview) {
        $otherReviews = $otherReviews->where('id', '!=', $myReview->id);
    }

    return view('perfumes.show', compact('perfume', 'myReview', 'otherReviews'));
}
}