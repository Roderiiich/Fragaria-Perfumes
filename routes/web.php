<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfumeController; 
use Illuminate\Support\Facades\Route;

// 1. Ruta del catálogo principal
Route::get('/', [PerfumeController::class, 'index'])->name('perfumes.index');

// 2. Nueva ruta para ver el detalle de cada perfume (la de las reseñas)
Route::get('/perfumes/{perfume}', [PerfumeController::class, 'show'])->name('perfumes.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';