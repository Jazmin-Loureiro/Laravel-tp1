<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

// HOME ROUTES
Route::get('/', function () {
    return view('home');
});
// AUTH ROUTES
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
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/show/{id}', [CategoryController::class, 'getShow']);


Route::get('/category/create', function () {
    return view('category.create');
});

Route::get('/category/edit/{id}', function ($id) {
    return view('category.edit', ['id' => $id]);
});

