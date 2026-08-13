<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SiswaController;

Route::get('/', function () {
    return redirect('/login');
});

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
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard Siswa (khusus role: student)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard Admin & Kelola Siswa (khusus role: admin)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Kelola Siswa
    Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa.index');
    Route::get('/admin/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
    Route::put('/admin/siswa/{siswa}', [SiswaController::class, 'update'])->name('admin.siswa.update');
    Route::delete('/admin/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');
});