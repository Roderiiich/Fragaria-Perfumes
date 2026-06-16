<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Muestra la vista de registro.
     */
    public function create(): View
    {
        return view('perfumes.register');
    }

    /**
     * Maneja la petición de registro de un nuevo usuario.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validamos que cumpla tus requerimientos estrictos
        $request->validate([
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Creamos el registro en la base de datos
        $user = User::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // 3. Iniciamos la sesión del usuario recién creado
        Auth::login($user);

        // 4. Lo enviamos de vuelta al catálogo principal
        return redirect(route('perfumes.index', absolute: false));
    }
}