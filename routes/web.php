<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OperatorAkademikController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::controller(\App\Http\Controllers\RegisterController::class)->group(function () {
        Route::get('/register', 'index')->name('register.index');
        Route::post('/register', 'store')->name('register.store');
    });

    Route::controller(\App\Http\Controllers\LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login.index');
        Route::post('/login', 'store')->name('login.store');
    });
});

Route::middleware(['auth', 'role:admin,operator'])->group(function () {
    Route::controller(\App\Http\Controllers\LoginController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
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
        Route::match(['put', 'patch'], '/dashboard/operator/{id}/edit', 'update')->name('dashboard.operator.update');
        Route::delete('/dashboard/operator/{id}/delete', 'destroy')->name('dashboard.operator.destroy');
    });

    Route::controller(\App\Http\Controllers\StudentController::class)->group(function () {
        Route::get('/dashboard/student', 'index')->name('dashboard.student.index');
        Route::get('/dashboard/student/create', 'create')->name('dashboard.student.create');
        Route::get('/dashboard/student/{id}', 'show')->name('dashboard.student.show');
        Route::get('/dashboard/student/{id}/edit', 'edit')->name('dashboard.student.edit');

        Route::post('/dashboard/student', 'store')->name('dashboard.student.store');
        Route::match(['put', 'patch'], '/dashboard/student/{id}/edit', 'update')->name('dashboard.student.update');
        Route::delete('/dashboard/student/{id}/delete', 'destroy')->name('dashboard.student.destroy');
    });

    Route::controller(\App\Http\Controllers\BlogController::class)->group(function () {
        Route::get('/dashboard/blog', 'index')->name('dashboard.blog.index');
        Route::get('/dashboard/blog/create', 'create')->name('dashboard.blog.create');
        Route::get('/dashboard/blog/{id}', 'show')->name('dashboard.blog.show');
        Route::get('/dashboard/blog/{id}/edit', 'edit')->name('dashboard.blog.edit');

        Route::post('/dashboard/blog', 'store')->name('dashboard.blog.store');
        Route::match(['put', 'patch'], '/dashboard/blog/{id}/edit', 'update')->name('dashboard.blog.update');
        Route::delete('/dashboard/blog/{id}/delete', 'destroy')->name('dashboard.blog.destroy');
    });

    Route::controller(\App\Http\Controllers\SubmissionController::class)->group(function () {
        Route::get('/dashboard/submission', 'index')->name('dashboard.submission.index');
        Route::get('/dashboard/submission/create', 'create')->name('dashboard.submission.create');
        Route::get('/dashboard/submission/{id}', 'show')->name('dashboard.submission.show');
        Route::get('/dashboard/submission/{id}/edit', 'edit')->name('dashboard.submission.edit');
        Route::get('/dashboard/submission/export/excel', 'export')->name('dashboard.submission.export-excel');

        Route::post('/dashboard/submission', 'store')->name('dashboard.submission.store');
        Route::match(['put', 'patch'], '/dashboard/submission/{id}/edit', 'update')->name('dashboard.submission.update');
        Route::delete('/dashboard/submission/{id}/delete', 'destroy')->name('dashboard.submission.destroy');
        Route::post('/dashboard/submission/{id}/confirm', 'confirm')->name('dashboard.submission.confirm');
    });

    Route::controller(\App\Http\Controllers\SubmissionPostController::class)->group(function () {
        Route::get('/dashboard/submission-post', 'index')->name('dashboard.submission-post.index');
        Route::get('/dashboard/submission-post/{id}', 'show')->name('dashboard.submission-post.show');
        Route::get('/dashboard/submission-post/{id}/edit', 'edit')->name('dashboard.submission-post.edit');

        Route::match(['put', 'patch'], '/dashboard/submission-post/{id}/edit', 'update')->name('dashboard.submission-post.update');
        Route::delete('/dashboard/submission-post/{id}/delete', 'destroy')->name('dashboard.submission-post.destroy');
    });

    Route::controller(\App\Http\Controllers\TimelineController::class)->group(function () {
        Route::get('/dashboard/submission/{submission}/timeline/create', 'create')->name('dashboard.timeline.create');
        Route::get('/dashboard/submission/{submission}/timeline/{timeline}', 'show')->name('dashboard.timeline.show');
        Route::get('/dashboard/submission/{submission}/timeline/{timeline}/edit', 'edit')->name('dashboard.timeline.edit');

        Route::post('/dashboard/submission/{submission}/timeline/create', 'store')->name('dashboard.timeline.store');
        Route::match(['put', 'patch'], '/dashboard/submission/{submission}/timeline/{timeline}/edit', 'update')->name('dashboard.timeline.update');
        Route::delete('/dashboard/submission/{submission}/timeline/{timeline}/delete', 'destroy')->name('dashboard.timeline.destroy');
    });
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::controller(\App\Http\Controllers\MainController::class)->group(function () {
        Route::get('/', 'index')->name('main.index');
    });
});


Route::get('/beranda', [PageController::class, 'viewLanding'])->name('landing.page');
Route::get('/pengaduan', [PageController::class, 'viewPengaduan'])->name('pengaduan.page');
Route::get('/pengaduan/detail-pengaduan', [PageController::class, 'viewDetailPengaduan'])->name('detail.pengaduan.page');
Route::get('/pengaduan/formulir-akademik', [SubmissionController::class, 'viewForm'])->name('formulir.akademik.page');
Route::post('/pengaduan/formulir-akademik', [SubmissionController::class, 'store'])->name('formulir.akademik.store');
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
