<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/products', [ProductController::class, 'indexProducts'])->name('products');
Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/beranda', [PageController::class, 'viewLanding'])->name('landing.page');
Route::get('/pengaduan', [PageController::class, 'viewPengaduan'])->name('pengaduan.page');
Route::get('/pengaduan/detail-pengaduan', [PageController::class, 'viewDetailPengaduan'])->name('detail.pengaduan.page');
Route::get('/pengaduan/formulir-akademik', [PageController::class, 'viewForm1'])->name('formulir.akademik.page');
Route::get('/pengaduan/formulir-akademik/menunggu-verifikasi', [PageController::class, 'viewPostSubmit'])->name('formulir.akademik.postsubmit.page');
Route::get('/berita', [PageController::class, 'viewNews'])->name('news.page');
