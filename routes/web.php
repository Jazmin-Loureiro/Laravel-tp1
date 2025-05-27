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
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
