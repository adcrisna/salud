<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SekolahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::any('/', [LoginController::class, 'index'])->name('index');
Route::any('/proses_login', [LoginController::class, 'prosesLogin'])->name('login');
Route::any('/daftar', [LoginController::class, 'daftar'])->name('daftar');
Route::any('/proses_daftar', [LoginController::class, 'prosesDaftar'])->name('prosesDaftar');
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware(['admin'])->group(function () {
        Route::any('/home', [AdminController::class, 'index'])->name('admin.home');
        Route::any('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::any('/profileUpdate', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');

        Route::any('/sekolah', [AdminController::class, 'sekolah'])->name('admin.sekolah');
        Route::any('/sekolahAdd', [AdminController::class, 'addSekolah'])->name('admin.addSekolah');
        Route::any('/sekolahUpdate', [AdminController::class, 'updateSekolah'])->name('admin.updateSekolah');
        Route::any('/sekolahDelete/{id}', [AdminController::class, 'deleteSekolah'])->name('admin.deleteSekolah');

        Route::any('/pengajuan', [AdminController::class, 'pengajuan'])->name('admin.pengajuan');
        Route::any('/pengajuanUpdate', [AdminController::class, 'updatePengajuan'])->name('admin.updatePengajuan');
        Route::any('/pengajuanDetail/{id}', [AdminController::class, 'detailPengajuan'])->name('admin.detailPengajuan');

        Route::any('/jadwal', [AdminController::class, 'jadwal'])->name('admin.jadwal');
        Route::any('/jadwal/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
        Route::any('/jadwalUpdate', [AdminController::class, 'updateJadwal'])->name('admin.updateJadwal');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('sekolah')->middleware(['sekolah'])->group(function () {
        Route::any('/home', [SekolahController::class, 'index'])->name('sekolah.home');
        Route::any('/profile', [SekolahController::class, 'profile'])->name('sekolah.profile');
        Route::any('/profileUpdate', [SekolahController::class, 'updateProfile'])->name('sekolah.updateProfile');

        Route::any('/pengajuan', [SekolahController::class, 'pengajuan'])->name('sekolah.pengajuan');
        Route::any('/pengajuanAdd', [SekolahController::class, 'addPengajuan'])->name('sekolah.addPengajuan');
        Route::any('/pengajuanPdf/{id}', [SekolahController::class, 'pdfPengajuan'])->name('sekolah.pdfPengajuan');
        Route::any('/pengajuanSend', [SekolahController::class, 'sendPengajuan'])->name('sekolah.sendPengajuan');

        Route::any('/jadwal', [SekolahController::class, 'jadwal'])->name('sekolah.jadwal');
    });
});