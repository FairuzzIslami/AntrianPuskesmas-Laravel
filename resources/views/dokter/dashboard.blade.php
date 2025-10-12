@extends('layout.navbar-dokter')

@section('content')
<div class="container-fluid py-4 animate__animated animate__fadeIn">

    <!-- Header Selamat Datang -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow border-0 rounded-4 overflow-hidden">
                <div class="card-body bg-gradient-success text-white p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold mb-2">Selamat Datang, Dokter. {{ Auth::user()->name ?? 'Dokter' }} 👨‍⚕️</h2>
                            <p class="mb-0 text-white-50">Semoga hari Anda menyenangkan. Berikut ringkasan aktivitas hari ini.</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-white text-success rounded-4 shadow-sm px-4 py-3 d-inline-block">
                                <h4 class="mb-0 fw-bold" id="current-time">00:00:00</h4>
                                <small id="current-date" class="text-muted">Hari, Tanggal</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="row">
        <!-- Tindakan Cepat & Jadwal -->
        <div class="col-lg-6 mb-4">
            <!-- Tindakan Cepat -->
            <div class="card shadow rounded-4 border-0 mb-4">
                <div class="card-header bg-success text-white rounded-top-4">
                    <h5 class="card-title mb-0"><i class="bi bi-lightning-fill me-2"></i>Tindakan Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ route('dokter.pemanggilan') }}"
                               class="btn btn-gradient-success w-100 py-3 shadow-sm rounded-3 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-bell-fill fa-lg"></i>
                                <div class="text-start">
                                    <div class="fw-bold text-white">Panggil Pasien</div>
                                    <small class="text-white-50">Pasien berikutnya</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('dokter.daftar-pasien') }}"
                               class="btn btn-gradient-warning w-100 py-3 shadow-sm rounded-3 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-people-fill fa-lg"></i>
                                <div class="text-start">
                                    <div class="fw-bold text-dark">Daftar Pasien</div>
                                    <small class="text-muted">Lihat semua data</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Hari Ini -->
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h5 class="card-title mb-0"><i class="bi bi-calendar-day me-2"></i>Jadwal Hari Ini</h5>
                </div>
                <div class="card-body">
                    <ul class="timeline list-unstyled mb-0">
                        <li class="timeline-item">
                            <span class="timeline-marker bg-primary"></span>
                            <div class="timeline-content">
                                <h6 class="fw-bold text-primary">08:00 - 10:00</h6>
                                <p class="mb-1">Konsultasi Umum</p>
                                <small class="text-muted">Poli Penyakit Dalam</small>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-marker bg-success"></span>
                            <div class="timeline-content">
                                <h6 class="fw-bold text-success">10:30 - 12:00</h6>
                                <p class="mb-1">Pemeriksaan Rutin</p>
                                <small class="text-muted">Pasien Lansia</small>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <span class="timeline-marker bg-warning"></span>
                            <div class="timeline-content">
                                <h6 class="fw-bold text-warning">13:30 - 15:00</h6>
                                <p class="mb-1">Konsultasi Spesialis</p>
                                <small class="text-muted">Poli Jantung</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pengumuman -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow rounded-4 border-0 h-100">
                <div class="card-header bg-warning text-dark rounded-top-4">
                    <h5 class="card-title mb-0"><i class="bi bi-megaphone-fill me-2"></i>Pengumuman & Pemberitahuan</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info d-flex align-items-center shadow-sm rounded-3 mb-3">
                        <i class="bi bi-info-circle me-3 fa-2x text-info"></i>
                        <div>
                            <strong>Rapat Bulanan Staf Medis</strong><br>
                            Jumat, 15 Desember 2023 pukul 14.00<br>
                            <small class="text-muted">Ruang Rapat Utama</small>
                        </div>
                    </div>
                    <div class="alert alert-success d-flex align-items-center shadow-sm rounded-3 mb-0">
                        <i class="bi bi-check-circle me-3 fa-2x text-success"></i>
                        <div>
                            <strong>Update Sistem Berhasil</strong><br>
                            Versi terbaru <b>2.1.0</b> telah diinstal<br>
                            <small class="text-muted">Lihat pembaruan fitur terbaru</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- ====== STYLE SECTION ====== -->
<style>
    /* Warna dan gradasi */
    .bg-gradient-success {
        background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%) !important;
    }
    .btn-gradient-success {
        background: linear-gradient(135deg, #4caf50, #388e3c);
        color: #fff;
        transition: 0.3s;
    }
    .btn-gradient-success:hover {
        background: linear-gradient(135deg, #388e3c, #2e7d32);
        transform: translateY(-2px);
    }
    .btn-gradient-warning {
        background: linear-gradient(135deg, #ffeb3b, #fbc02d);
        color: #212529;
        transition: 0.3s;
    }
    .btn-gradient-warning:hover {
        background: linear-gradient(135deg, #fbc02d, #f9a825);
        transform: translateY(-2px);
    }

    /* Timeline */
    .timeline {
        border-left: 3px solid #dee2e6;
        margin-left: 12px;
        padding-left: 20px;
    }
    .timeline-item {
        position: relative;
        margin-bottom: 22px;
    }
    .timeline-marker {
        position: absolute;
        left: -26px;
        top: 4px;
        width: 14px;
        height: 14px;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
    }

    /* Card dan teks */
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-3px);
    }
    h2, h5 {
        font-family: 'Poppins', sans-serif;
    }
</style>

<!-- ====== SCRIPT SECTION ====== -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateTime() {
            const now = new Date();
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID');
            document.getElementById('current-date').textContent = now.toLocaleDateString('id-ID', options);
        }
        updateTime();
        setInterval(updateTime, 1000);
    });
</script>
@endsection
