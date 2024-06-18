<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

// Página Principal
Route::get('/', function () {
    return view('principal');
});

// Crear Cuenta
Route::get('/crear-cuenta', [RegisterController::class, 'index']);
