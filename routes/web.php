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
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/show/{id}', [PostController::class, 'getShow']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts/store', [PostController::class, 'store']);
Route::get('/posts/edit/{id}', [PostController::class, 'edit']);


// CATEGORY ROUTES
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/show/{id}', [CategoryController::class, 'getShow']);


Route::get('/category/create', function () {
    return view('category.create');
});

Route::get('/category/edit/{id}', function ($id) {
    return view('category.edit', ['id' => $id]);
});

