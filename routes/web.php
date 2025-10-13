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
use App\Http\Controllers\CatatanMedisController;



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
    Route::get('/admin/dokter', [AdminDokterController::class, 'index'])->name('admin.dokter');
    Route::get('/admin/dokter/create', [AdminDokterController::class, 'create'])->name('admin.dokter.create');
    Route::post('/admin/dokter', [AdminDokterController::class, 'store'])->name('admin.dokter.store');
    Route::get('/admin/dokter/{id}/edit', [AdminDokterController::class, 'edit'])->name('admin.dokter.edit');
    Route::put('/admin/dokter/{id}', [AdminDokterController::class, 'update'])->name('admin.dokter.update');
    Route::delete('/admin/dokter/{id}', [AdminDokterController::class, 'destroy'])->name('admin.dokter.destroy');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPDF'])->name('laporan.export.pdf');
    Route::get('/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');
});


// ----------------- PASIEN ------------------ //

// Beranda pasien
Route::get('/pasien', [PasienController::class, 'beranda'])->name('pasien.beranda');
Route::get('/pasien/pemanggilan', [PasienController::class, 'pemanggilan'])
    ->middleware('auth')
    ->name('pasien.pemanggilan');

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

    // Pemanggilan pasien
    Route::prefix('pemanggilan')->group(function () {
        Route::get('/', [DokterController::class, 'pemanggilan'])->name('pemanggilan'); // ini route yang dipakai di blade
        Route::post('/dokter/panggil/{id}', [DokterController::class, 'panggil'])->name('dokter.panggil');
        Route::post('/dokter/mulai/{id}', [DokterController::class, 'mulai'])->name('dokter.mulai');
        Route::post('/dokter/selesai/{id}', [DokterController::class, 'selesai'])->name('dokter.selesai');
        Route::delete('/hapus/{id}', [DokterController::class, 'hapus'])->name('hapus');
    });

    // Catatan medis
    Route::get('/catatan-medis', [DokterController::class, 'catatanMedis'])->name('catatan-medis');
    Route::get('/catatan-medis/{pasien_id}', [CatatanMedisController::class, 'create'])->name('catatan-medis.create');
    Route::post('/catatan-medis/{pasien_id}', [CatatanMedisController::class, 'store'])->name('catatan-medis.store');
});

// laporan dokter
Route::middleware(['auth'])->group(function () {
    Route::get('/dokter/laporan', [App\Http\Controllers\LaporanDokterController::class, 'index'])->name('dokter.laporan');
    Route::post('/dokter/laporan', [App\Http\Controllers\LaporanDokterController::class, 'store'])->name('dokter.laporan.store');
    // Route untuk halaman input laporan dokter
    Route::get('/dokter/laporan/{pasien_id}', [App\Http\Controllers\LaporanDokterController::class, 'create'])
        ->name('dokter.laporan.create');

    // Route untuk menyimpan laporan ke database
    Route::post('/dokter/laporan', [App\Http\Controllers\LaporanDokterController::class, 'store'])
        ->name('dokter.laporan.store');

    Route::delete('/laporan/{id}', [App\Http\Controllers\LaporanDokterController::class, 'destroy'])->name('laporan.destroy');
});
