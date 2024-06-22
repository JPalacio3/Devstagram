<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Modificar el request : Se recomienda no realizar esta acción a menos que sea la última opción
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validación
        $request->validate([
            'name' => 'required|max:20',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:8'
        ]);

        // Crear usuario
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) // Encriptar la contraseña usando Hash::make
        ]);

        // Autenticar automáticamente el usuario
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('posts.index', $request->username);
    }
}
