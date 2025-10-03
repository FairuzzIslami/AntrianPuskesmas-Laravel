<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DokterController as AdminDokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
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

// ----------------- ADMIN ------------------ //
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/dokter', [AdminDokterController::class, 'index'])->name('admin.dokter');
    Route::get('/dokter/create', [AdminDokterController::class, 'create'])->name('admin.dokter.create');
    Route::post('/dokter', [AdminDokterController::class, 'store'])->name('admin.dokter.store');
    Route::get('/dokter/{id}/edit', [AdminDokterController::class, 'edit'])->name('admin.dokter.edit');
    Route::put('/dokter/{id}', [AdminDokterController::class, 'update'])->name('admin.dokter.update');
    Route::delete('/dokter/{id}', [AdminDokterController::class, 'destroy'])->name('admin.dokter.destroy');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
});

// ----------------- PASIEN ------------------ //
// Halaman dashboard pasien
Route::get('/pasien', [PasienController::class, 'index'])
    ->name('pasien.beranda')
    ->middleware('auth');


// ----------------- DOKTER ------------------ //
Route::middleware(['auth'])->group(function () {
    Route::get('/dokter/dashboard', [DokterController::class, 'dashboard'])
        ->name('dokter.dashboard');
});

// Dashboard Dokter
Route::get('/dokter/dashboard', function () {
    return view('dokter.dashboard');
})->name('dokter.dashboard');

// Daftar Pasien

Route::prefix('dokter')->name('dokter.')->group(function() {
    Route::get('/dashboard', [DokterController::class, 'dashboard'])->name('dashboard');
    Route::get('/daftar-pasien', [DokterController::class, 'daftarPasien'])->name('daftar-pasien');
    Route::get('/pemanggilan', [DokterController::class, 'pemanggilan'])->name('pemanggilan');
    Route::get('/catatan-medis', [DokterController::class, 'catatanMedis'])->name('catatan-medis');
});

Route::prefix('dokter')->group(function () {
    Route::get('pemanggilan', [DokterController::class, 'pemanggilan'])->name('dokter.pemanggilan');
    Route::post('pemanggilan/panggil/{id}', [DokterController::class, 'panggil'])->name('dokter.panggil');
    Route::post('pemanggilan/selesai/{id}', [DokterController::class, 'selesai'])->name('dokter.selesai');
    Route::delete('pemanggilan/hapus/{id}', [DokterController::class, 'hapus'])->name('dokter.hapus');

});
