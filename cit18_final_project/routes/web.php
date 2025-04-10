<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DessertsController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/desserts', DessertsController::class);

