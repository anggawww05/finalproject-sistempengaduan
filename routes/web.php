<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/products', [ProductController::class, 'indexProducts'])->name('products');
Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::get('login', [LoginController::class, 'view'])->name('login');
