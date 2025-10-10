@extends('layout.navbar-dokter')

@section('content')
<div class="container py-4 animate__animated animate__fadeIn">

    <!-- Header -->
    <div class="card shadow border-0 rounded-4 mb-4">
        <div class="card-body bg-gradient-success text-white p-4">
            <h3 class="fw-bold mb-0"><i class="fas fa-file-medical-alt me-2"></i>Tambah Laporan Pemeriksaan</h3>
            <p class="mb-0">Isi laporan pemeriksaan pasien berikut dengan lengkap</p>
        </div>
    </div>

    <!-- Form -->
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('dokter.laporan.store') }}" method="POST">
                @csrf

                <!-- Dokter ID -->
                <input type="hidden" name="dokter_id" value="{{ auth()->user()->id }}">

                <!-- Nama Pasien -->
                <div class="mb-3">
                    <label class="form-label fw-bold text-success">Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control border-success"
                        value="{{ $pasien->name }}" readonly>
                </div>

                <!-- Diagnosa -->
                <div class="mb-3">
                    <label class="form-label fw-bold text-success">Diagnosa</label>
                    <input type="text" name="diagnosa" class="form-control border-success"
                        placeholder="Masukkan hasil diagnosa pasien" required>
                </div>

                <!-- Catatan Medis -->
                <div class="mb-3">
                    <label class="form-label fw-bold text-success">Catatan Medis</label>
                    <textarea name="catatan_medis" rows="4" class="form-control border-success"
                        placeholder="Tuliskan catatan tambahan atau saran pengobatan (opsional)"></textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('dokter.dashboard') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-paper-plane me-1"></i> Kirim ke Admin
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- STYLE --}}
<style>
    .bg-gradient-success {
        background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%) !important;
    }

    .btn-success {
        background-color: #43a047 !important;
        border-color: #43a047 !important;
    }

    .btn-success:hover {
        background-color: #2e7d32 !important;
    }

    .form-control:focus {
        border-color: #43a047;
        box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
    }
</style>
@endsection
