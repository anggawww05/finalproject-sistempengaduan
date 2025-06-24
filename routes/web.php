<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OperatorAkademikController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TimelineController;
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
Route::get('/pengaduan/formulir-akademik', [ReportController::class, 'viewForm'])->name('formulir.akademik.page');
Route::post('/pengaduan/formulir-akademik', [ReportController::class, 'store'])->name('formulir.akademik.store');
// Route::get('/pengaduan/formulir-akademik/menunggu-verifikasi', [PageController::class, 'viewPostSubmit'])->name('formulir.akademik.postsubmit.page');
Route::get('/berita', [PageController::class, 'viewNews'])->name('news.page');
Route::get('/timeline', [TimelineController::class, 'indexTimeline'])->name('timeline.page');
Route::get('/timeline/detail', [TimelineController::class, 'indexDetailTimeline'])->name('timeline.detail.page');


//operator akademik
Route::get('/operator-akademik/dashboard', [OperatorAkademikController::class, 'indexDashboard'])->name('operatorakademik.dashboard');
Route::get('/operator-akademik/permintaan', [OperatorAkademikController::class, 'indexPermintaan'])->name('operatorakademik.permintaan');
Route::get('/operator-akademik/list-pengaduan', [OperatorAkademikController::class, 'indexListPengaduan'])->name('operatorakademik.listpengaduan');
Route::get('/operator-akademik/list-pengaduan/detail-pengaduan', [OperatorAkademikController::class, 'indexDetailPengaduan'])->name('operatorakademik.detailpengaduan');


//admin
Route::get('/admin/dashboard', [AdminController::class, 'indexDashboard'])->name('admin.dashboard');
Route::get('/admin/kelola-pengguna', [AdminController::class, 'indexPengguna'])->name('admin.kelola.pengguna');
Route::get('/admin/kelola-pengguna/detail', [AdminController::class, 'indexDetailPengguna'])->name('admin.kelola.pengguna.detail');
Route::get('/admin/kelola-berita', [AdminController::class, 'indexBerita'])->name('admin.kelola.berita');
Route::get('/admin/kelola-berita/detail', [AdminController::class, 'indexDetailBerita'])->name('admin.kelola.berita.detail');
Route::get('/admin/kelola-pengaduan', [AdminController::class, 'indexPengaduan'])->name('admin.kelola.pengaduan');
Route::get('/admin/kelola-pengaduan/detail', [AdminController::class, 'indexDetailPengaduan'])->name('admin.kelola.pengaduan.detail');
Route::get('/admin/kelola-laporan', [AdminController::class, 'indexLaporan'])->name('admin.kelola.laporan');
Route::get('/admin/kelola-laporan/detail', [AdminController::class, 'indexDetailLaporan'])->name('admin.kelola.laporan.detail');
