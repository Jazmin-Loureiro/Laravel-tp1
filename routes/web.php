<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

// HOME ROUTES
Route::get('/', [HomeController::class, 'getHome'])->name('home');
// AUTH ROUTES FALTA REVISAR
Route::get('/login', function () {
    return view('auth.login');
});

// POST ROUTES
//Ver lista de posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//ver post por id
Route::get('/posts/show/{id}', [PostController::class, 'show'])->name('posts.show');

//editar post por id
Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
//actualizar post por id
Route::post('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

// Mostrar formulario para crear post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Guardar nuevo post
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');



// CATEGORY ROUTES
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
