<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // Cerrar la sesión
    public function store()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
