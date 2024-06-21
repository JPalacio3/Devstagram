<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

// Página Principal
Route::get('/', function () {
    return view('principal');
});

// Ruta para mostrar el formulario de registro
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Ruta para procesar el formulario de registro
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//Ruta pública del muro de publicaciones
Route::get('/muro', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
