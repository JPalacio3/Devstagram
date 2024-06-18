<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

// Página Principal
Route::get('/', function () {
    return view('principal');
});

// Crear Cuenta
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
