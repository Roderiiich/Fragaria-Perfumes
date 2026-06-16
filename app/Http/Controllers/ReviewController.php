<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Perfume;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Perfume $perfume)
    {
        $request->validate([
            'calificacion' => ['required', 'integer', 'min:1', 'max:5'],
            'comentario'   => ['required', 'string', 'max:1000'],
            'duracion'     => ['required', 'integer', 'min:1', 'max:24'],
            'proyeccion'   => ['required', 'integer', 'in:1,2,3'],
        ]);

        Review::create([
            'user_id'      => auth()->id(),
            'perfume_id'   => $perfume->id,
            'calificacion' => $request->calificacion,
            'comentario'   => $request->comentario,
            'duracion'     => $request->duracion,
            'proyeccion'   => $request->proyeccion,
        ]);

        return redirect()->route('perfumes.show', $perfume->id)
                         ->with('success', 'Reseña publicada correctamente.');
    }

    public function update(Request $request, Review $review)
    {
        abort_if($review->user_id !== auth()->id(), 403);

        $request->validate([
            'calificacion' => ['required', 'integer', 'min:1', 'max:5'],
            'comentario'   => ['required', 'string', 'max:1000'],
            'duracion'     => ['required', 'integer', 'min:1', 'max:24'],
            'proyeccion'   => ['required', 'integer', 'in:1,2,3'],
        ]);

        $review->update($request->only(['calificacion', 'comentario', 'duracion', 'proyeccion']));

        return redirect()->route('perfumes.show', $review->perfume_id)
                         ->with('success', 'Reseña actualizada correctamente.');
    }

    public function destroy(Review $review)
    {
        abort_if($review->user_id !== auth()->id(), 403);

        $perfume_id = $review->perfume_id;
        $review->delete();

        return redirect()->route('perfumes.show', $perfume_id)
                         ->with('success', 'Reseña eliminada correctamente.');
    }
}