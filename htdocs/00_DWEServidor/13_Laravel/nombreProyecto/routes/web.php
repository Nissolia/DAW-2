<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\secundarioController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', IndexController::class);

Route::get('/secundaria', secundarioController::class);

