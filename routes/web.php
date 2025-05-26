<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/category', function () {
    return view('category.index');
});

Route::get('/category/show/{id}', function ($id) {
    return view('category.show', ['id' => $id]);
});

Route::get('/category/create', function () {
    return view('category.create');
});

Route::get('/category/edit/{id}', function ($id) {
    return view('category.edit', ['id' => $id]);
});

