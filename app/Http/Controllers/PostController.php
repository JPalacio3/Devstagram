<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Proteger la ruta del muro, para poder acceder al muro el usuario debe estar autenticado


    //
    public function index(User $user)
    {
        return view('dashboard', [
            'user' => $user
        ]);
    }
}
