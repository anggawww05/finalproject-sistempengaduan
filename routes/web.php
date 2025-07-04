<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OperatorAkademikController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\RegisterController::class)->group(function () {
    Route::get('/register', 'index')->name('register.index');
    Route::post('/register', 'store')->name('register.store');
});

Route::controller(\App\Http\Controllers\LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(\App\Http\Controllers\MainController::class)->group(function () {
    Route::get('/', 'index')->name('main.index');
});

Route::controller(\App\Http\Controllers\DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard.index');
});

Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
    Route::get('/dashboard/admin', 'index')->name('dashboard.admin.index');
    Route::get('/dashboard/admin/{id}', 'show')->name('dashboard.admin.show');
});

Route::controller(\App\Http\Controllers\OperatorController::class)->group(function () {
    Route::get('/dashboard/operator', 'index')->name('dashboard.operator.index');
    Route::get('/dashboard/operator/create', 'create')->name('dashboard.operator.create');
    Route::get('/dashboard/operator/{id}', 'show')->name('dashboard.operator.show');
    Route::get('/dashboard/operator/{id}/edit', 'edit')->name('dashboard.operator.edit');

    Route::post('/dashboard/operator', 'store')->name('dashboard.operator.store');
    Route::post('/dashboard/operator/{id}/edit', 'update')->name('dashboard.operator.update');
    Route::post('/dashboard/operator/{id}/delete', 'destroy')->name('dashboard.operator.destroy');
});

Route::controller(\App\Http\Controllers\StudentController::class)->group(function () {
    Route::get('/dashboard/student', 'index')->name('dashboard.student.index');
    Route::get('/dashboard/student/create', 'create')->name('dashboard.student.create');
    Route::get('/dashboard/student/{id}', 'show')->name('dashboard.student.show');
    Route::get('/dashboard/student/{id}/edit', 'edit')->name('dashboard.student.edit');

    Route::post('/dashboard/student', 'store')->name('dashboard.student.store');
    Route::post('/dashboard/student/{id}/edit', 'update')->name('dashboard.student.update');
    Route::post('/dashboard/student/{id}/delete', 'destroy')->name('dashboard.student.destroy');
});

Route::controller(\App\Http\Controllers\BlogController::class)->group(function () {
    Route::get('/dashboard/blog', 'index')->name('dashboard.blog.index');
    Route::get('/dashboard/blog/create', 'create')->name('dashboard.blog.create');
    Route::get('/dashboard/blog/{id}', 'show')->name('dashboard.blog.show');
    Route::get('/dashboard/blog/{id}/edit', 'edit')->name('dashboard.blog.edit');

    Route::post('/dashboard/blog', 'store')->name('dashboard.blog.store');
    Route::post('/dashboard/blog/{id}/edit', 'update')->name('dashboard.blog.update');
    Route::post('/dashboard/blog/{id}/delete', 'destroy')->name('dashboard.blog.destroy');
});

Route::controller(\App\Http\Controllers\ReportController::class)->group(function () {
    Route::get('/dashboard/report', 'index')->name('dashboard.report.index');
});

Route::controller(\App\Http\Controllers\ReportController::class)->group(function () {
    Route::get('/dashboard/report', 'index')->name('dashboard.report.index');
    Route::get('/dashboard/report/create', 'create')->name('dashboard.report.create');
    Route::get('/dashboard/report/{id}', 'show')->name('dashboard.report.show');
    Route::get('/dashboard/report/{id}/edit', 'edit')->name('dashboard.report.edit');

    Route::post('/dashboard/report', 'store')->name('dashboard.report.store');
    Route::post('/dashboard/report/{id}/edit', 'update')->name('dashboard.report.update');
    Route::post('/dashboard/report/{id}/delete', 'destroy')->name('dashboard.report.destroy');
});

Route::controller(\App\Http\Controllers\ReportPostController::class)->group(function () {
    Route::get('/dashboard/report-post', 'index')->name('dashboard.report-post.index');
    Route::get('/dashboard/report-post/{id}', 'show')->name('dashboard.report-post.show');
    Route::get('/dashboard/report-post/{id}/edit', 'edit')->name('dashboard.report-post.edit');

    Route::post('/dashboard/report-post/{id}/edit', 'update')->name('dashboard.report-post.update');
    Route::post('/dashboard/report-post/{id}/delete', 'destroy')->name('dashboard.report-post.destroy');
});


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
