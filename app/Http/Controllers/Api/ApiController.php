<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perfume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    /*POST /api/login autentica un usuario y retorna un token sanctum.*/

    public function login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas son incorrectas.'],
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user'  => [
                'nickname' => $user->nickname,
                'email'    => $user->email,
            ],
        ]);
    }

    /*GET /api/perfumes lista perfumes con búsqueda opcional por nombre se requiere token */
    public function perfumes(Request $request)
    {
        $query = Perfume::with(['brand', 'category'])
            ->withAvg('reviews as duracion_promedio', 'duracion')
            ->withAvg('reviews as proyeccion_promedio', 'proyeccion');

        if ($request->filled('search')) {
            $query->where('nombre', 'LIKE', '%' . $request->search . '%');
        }

        $perfumes = $query->get()->map(function ($perfume) {
            $proyeccionMap = [1 => 'Leve', 2 => 'Moderado', 3 => 'Intenso'];
            $proyeccionNum = round($perfume->proyeccion_promedio);

            return [
                'nombre'          => $perfume->nombre,
                'descripcion'     => $perfume->descripcion,
                'marca'           => $perfume->brand->nombre,
                'familia_olfativa' => $perfume->category->nombre,
                'duracion'        => $perfume->duracion_promedio
                                        ? round($perfume->duracion_promedio, 1) . ' hrs'
                                        : 'Sin reseñas',
                'proyeccion'      => $proyeccionMap[$proyeccionNum] ?? 'Sin reseñas',
            ];
        });

        return response()->json(['data' => $perfumes]);
    }
}