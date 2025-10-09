<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DokterController as AdminDokterController;

// ----------------- HALAMAN UMUM ------------------ //
Route::get('/', fn() => view('home'))->name('home');
Route::get('/tentang', fn() => view('tentang'))->name('tentang');
Route::get('/kontak', fn() => view('kontak'))->name('kontak');
Route::get('/fitur', fn() => view('fitur'))->name('fitur');

// ----------------- AUTH ------------------ //
Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register.form');
    Route::post('/register', 'register')->name('register');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login.form');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

// ----------------- DASHBOARD ------------------ //
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // DASHBOARD
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // KELOLA DOKTER
    Route::get('/admin/dokter', [DokterController::class, 'index'])->name('admin.dokter');
    Route::get('/admin/dokter/create', [DokterController::class, 'create'])->name('admin.dokter.create');
    Route::post('/admin/dokter', [DokterController::class, 'store'])->name('admin.dokter.store');
    Route::get('/admin/dokter/{id}/edit', [DokterController::class, 'edit'])->name('admin.dokter.edit');
    Route::put('/admin/dokter/{id}', [DokterController::class, 'update'])->name('admin.dokter.update');
    Route::delete('/admin/dokter/{id}', [DokterController::class, 'destroy'])->name('admin.dokter.destroy');
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');

});


// ----------------- PASIEN ------------------ //

// Beranda pasien
Route::get('/pasien', [PasienController::class, 'index'])
    ->name('pasien.beranda');

// Poli Anak
Route::get('/pasien/poli-anak', [PasienController::class, 'poliAnak'])
    ->name('pasien.poli_anak');

// Poli Gigi
Route::get('/pasien/poli-gigi', [PasienController::class, 'poliGigi'])
    ->name('pasien.poli_gigi');

// Poli Umum
Route::get('/pasien/poli-umum', [PasienController::class, 'poliUmum'])
    ->name('pasien.poli_umum');

// Halaman manajemen pasien (untuk dokter)
Route::get('/dokter/pasien', [PasienController::class, 'index'])->name('dokter.pasien.index');

// Simpan data pasien baru
Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');

// Update status pasien (opsional)
Route::post('/pasien/{id}/status', [PasienController::class, 'updateStatus'])->name('pasien.updateStatus');
Route::post('/dokter/panggil/{id}', [PasienController::class, 'panggil'])->name('dokter.panggil');
Route::post('/dokter/mulai/{id}', [PasienController::class, 'mulaiPemeriksaan'])->name('dokter.mulai');
Route::post('/dokter/selesai/{id}', [PasienController::class, 'selesai'])->name('dokter.selesai');


// ----------------- DOKTER ------------------ //
Route::prefix('dokter')->name('dokter.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DokterController::class, 'dashboard'])->name('dashboard');
    Route::get('/daftar-pasien', [DokterController::class, 'daftarPasien'])->name('daftar-pasien');
    
    // Group pemanggilan-related routes
    Route::prefix('pemanggilan')->name('pemanggilan.')->group(function () {
        Route::get('/', [DokterController::class, 'pemanggilan'])->name('index');
        Route::post('/panggil/{id}', [DokterController::class, 'panggil'])->name('panggil');
        Route::post('/selesai/{id}', [DokterController::class, 'selesai'])->name('selesai');
        Route::delete('/hapus/{id}', [DokterController::class, 'hapus'])->name('hapus');
    });
    
    Route::get('/catatan-medis', [DokterController::class, 'catatanMedis'])->name('catatan-medis');

});

use App\Http\Controllers\CatatanMedisController;

Route::get('/dokter/catatan-medis/{pasien_id}', [CatatanMedisController::class, 'create'])
    ->name('dokter.catatan-medis.create');

Route::post('/dokter/catatan-medis/{pasien_id}', [CatatanMedisController::class, 'store'])
    ->name('dokter.catatan-medis.store');


