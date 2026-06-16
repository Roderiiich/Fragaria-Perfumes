<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

// Endpoint público: autenticación
Route::post('/login', [ApiController::class, 'login']);

// Endpoints protegidos por token Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/perfumes', [ApiController::class, 'perfumes']);
});