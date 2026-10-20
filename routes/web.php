<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\SettingController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\TesController;
use App\Http\Controllers\Student\HasilController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\HasilTesController;
use App\Http\Controllers\Admin\PertanyaanController;

Route::redirect('/', '/login');

/*
|--------------------------------------------------------------------------
| Register
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Lupa Password
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])
    ->name('password.request');

Route::post('/forgot-password', [AuthController::class, 'sendResetOtp'])
    ->name('password.email');

Route::get('/verify-otp', [AuthController::class, 'showOtp'])
    ->name('password.otp');

Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])
    ->name('password.verify');

Route::get('/reset-password', [AuthController::class, 'showResetPassword'])
    ->name('password.reset');

Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');

/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard Siswa, Setting Profil, Tes & Hasil
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])
        ->name('student.dashboard');

    Route::get('/setting', [SettingController::class, 'index'])
        ->name('student.setting');

    Route::post('/setting', [SettingController::class, 'update'])
        ->name('student.setting.update');

    // Tes Minat & Bakat
    Route::get('/tes', [TesController::class, 'mulai'])->name('tes.mulai');
    Route::get('/tes/soal/{nomor}', [TesController::class, 'soal'])->name('tes.soal');
    Route::post('/tes/soal/{nomor}', [TesController::class, 'jawab'])->name('tes.jawab');
    Route::get('/tes/selesai', [TesController::class, 'selesai'])->name('tes.selesai');

    // Hasil Tes
    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.tes');

    Route::get('/hasil/download-pdf', [HasilController::class, 'downloadPdf'])
        ->name('hasil.download');
});

/*
|--------------------------------------------------------------------------
| Dashboard Admin & Kelola Siswa
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Kelola Siswa
    Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa.index');
    Route::get('/admin/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
    Route::put('/admin/siswa/{siswa}', [SiswaController::class, 'update'])->name('admin.siswa.update');
    Route::put('/admin/siswa/{siswa}/reset-password', [SiswaController::class, 'resetPassword'])
        ->name('admin.siswa.reset-password');
    Route::delete('/admin/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');

    // Download sertifikat siswa (admin)
    Route::get('/admin/siswa/{siswa}/sertifikat', [SiswaController::class, 'downloadSertifikat'])
        ->name('admin.siswa.sertifikat');

    // Hasil Tes
    Route::get('/admin/hasil', [HasilTesController::class, 'index'])->name('admin.hasil.index');
    Route::get('/admin/hasil/{hasil}', [HasilTesController::class, 'show'])->name('admin.hasil.show');

    // Pertanyaan
    Route::get('/admin/pertanyaan', [PertanyaanController::class, 'index'])->name('admin.pertanyaan.index');
    Route::get('/admin/pertanyaan/{pertanyaan}/edit', [PertanyaanController::class, 'edit'])->name('admin.pertanyaan.edit');
    Route::put('/admin/pertanyaan/{pertanyaan}', [PertanyaanController::class, 'update'])->name('admin.pertanyaan.update');

    // Export data seluruh siswa
    Route::get('/admin/siswa/export/excel', [SiswaController::class, 'exportExcel'])
    ->name('admin.siswa.export.excel');

    Route::get('/admin/siswa/export/csv', [SiswaController::class, 'exportCsv'])
    ->name('admin.siswa.export.csv');
});