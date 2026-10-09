<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users;
use App\Http\Controllers\category;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', [users::class, 'index']);

Route::get('/category', [category::class, 'index']);


