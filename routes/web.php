<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kita mendaftarkan semua route web aplikasi.
| Route ini akan dimuat oleh RouteServiceProvider.
|
*/

// ----------------- HALAMAN UMUM ------------------ //
Route::get('/', fn() => view('home'))->name('home');
Route::get('/tentang', fn() => view('tentang'))->name('tentang');
Route::get('/kontak', fn() => view('kontak'))->name('kontak');
Route::get('/fitur', fn() => view('fitur'))->name('fitur');

// ----------------- AUTH ------------------ //
// Register
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login.form');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login');
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

// ----------------- DASHBOARD ------------------ //
// Dashboard utama → cek role di DashboardController
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// ----------------- PASIEN ------------------ //
// Halaman dashboard pasien
Route::get('/pasien', [PasienController::class, 'index'])
    ->name('pasien.beranda')
    ->middleware('auth');
