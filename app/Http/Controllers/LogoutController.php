<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LogoutController extends Controller
{
    // Cerrar la sesión
    public function store()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
