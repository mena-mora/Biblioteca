<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriasController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginform'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Aquí puedes agregar rutas que requieran autenticación
    // Por ejemplo:
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');

Route::get('/categorias/{id}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');
});

