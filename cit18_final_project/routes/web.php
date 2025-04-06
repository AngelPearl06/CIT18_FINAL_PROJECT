<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DessertController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/dessert', DessertController::class);

Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('desserts', DessertController::class);
});
