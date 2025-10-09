@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">Dashboard Admin</h2>
    <p class="text-muted">Selamat datang, <span class="fw-semibold">{{ auth()->user()->name }}</span> 👋</p>

    <div class="row g-4 mt-3">
        <!-- Card Kelola Dokter -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-person-badge fs-1 text-primary"></i>
                    </div>
                    <h5 class="card-title">Kelola Dokter</h5>
                    <p class="text-muted">Tambah, edit, dan hapus data dokter.</p>
                    <a href="{{ route('admin.dokter') }}" class="btn btn-primary w-100">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Card Kelola Laporan -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-file-earmark-text fs-1 text-success"></i>
                    </div>
                    <h5 class="card-title">Kelola Laporan</h5>
                    <p class="text-muted">Pantau laporan antrian dan data pengguna.</p>
                    <a href="{{ route('admin.laporan') }}" class="btn btn-success w-100">Lihat</a>
                </div>
            </div>
        </div>

        <!-- Card Tambahan (opsional, misalnya Statistik) -->
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-bar-chart-line fs-1 text-warning"></i>
                    </div>
                    <h5 class="card-title">Statistik</h5>
                    <p class="text-muted">Lihat ringkasan data antrian puskesmas.</p>
                    <a href="#" class="btn btn-warning w-100">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
