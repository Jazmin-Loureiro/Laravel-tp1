<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/category', [PostController::class, 'index']);

Route::get('/category/show/{id}', [PostController::class, 'getShow']);


Route::get('/category/create', function () {
    return view('category.create');
});

Route::get('/category/edit/{id}', function ($id) {
    return view('category.edit', ['id' => $id]);
});

