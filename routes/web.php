<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

// Página Principal
Route::get('/', function () {
    return view('principal');
});

// Ruta para mostrar el formulario de registro
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Ruta para procesar el formulario de registro
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Ruta pública del muro de publicaciones
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
