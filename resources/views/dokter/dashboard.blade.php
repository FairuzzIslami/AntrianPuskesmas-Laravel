@extends('layout.navbar-dokter')

@section('content')
<div class="container-fluid py-4 animate__animated animate__fadeIn">

    {{-- ===== HEADER SELAMAT DATANG ===== --}}
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden bg-glass-green mb-4">
        <div class="card-body text-white p-5 position-relative">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-2">
                        👨‍⚕️ Selamat Datang, <span class="text-warning">{{ Auth::user()->name ?? 'Dokter' }}</span>
                    </h2>
                    <p class="text-white-50 mb-0">
                        Semoga hari Anda menyenangkan! Berikut ringkasan aktivitas hari ini.
                    </p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="glass-card text-center p-3 rounded-4 shadow-sm">
                        <h4 class="fw-bold mb-1 text-success" id="current-time">00:00:00</h4>
                        <small class="text-muted d-block" id="current-date">Hari, Tanggal</small>
                    </div>
                </div>
            </div>
            <img src="https://cdn-icons-png.flaticon.com/512/3774/3774299.png" 
                 alt="doctor" class="position-absolute doctor-icon d-none d-md-block">
        </div>
    </div>

    {{-- ===== ROW KONTEN UTAMA ===== --}}
    <div class="row g-4">

        {{-- ===== TINDAKAN CEPAT ===== --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-header bg-success text-white rounded-top-4 py-3">
                    <h5 class="mb-0"><i class="bi bi-lightning-fill me-2"></i>Tindakan Cepat</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="{{ route('dokter.pemanggilan') }}"
                               class="btn-action bg-success-gradient w-100 rounded-4 d-flex flex-column align-items-center justify-content-center py-4 shadow-sm">
                                <i class="bi bi-bell-fill fa-2x mb-2"></i>
                                <span class="fw-bold text-white">Panggil Pasien</span>
                                <small class="text-white-50">Pasien berikutnya</small>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('dokter.daftar-pasien') }}"
                               class="btn-action bg-warning-gradient w-100 rounded-4 d-flex flex-column align-items-center justify-content-center py-4 shadow-sm">
                                <i class="bi bi-people-fill fa-2x mb-2 text-dark"></i>
                                <span class="fw-bold text-dark">Daftar Pasien</span>
                                <small class="text-muted">Lihat semua data</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== JADWAL HARI INI ===== --}}
            <div class="card border-0 shadow-lg rounded-4 mt-4">
                <div class="card-header bg-info text-white rounded-top-4 py-3">
                    <h5 class="mb-0"><i class="bi bi-calendar-day me-2"></i>Jadwal Hari Ini</h5>
                </div>
                <div class="card-body">
                    <ul class="timeline list-unstyled mb-0">
                        <li class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="fw-bold text-primary">08:00 - 10:00</h6>
                                <p class="mb-1">Konsultasi Umum</p>
                                <small class="text-muted">Poli Penyakit Dalam</small>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="fw-bold text-success">10:30 - 12:00</h6>
                                <p class="mb-1">Pemeriksaan Rutin</p>
                                <small class="text-muted">Pasien Lansia</small>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
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

        {{-- ===== PENGUMUMAN ===== --}}
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-4 h-100">
                <div class="card-header bg-warning text-dark rounded-top-4 py-3">
                    <h5 class="mb-0"><i class="bi bi-megaphone-fill me-2"></i>Pengumuman & Pemberitahuan</h5>
                </div>
                <div class="card-body bg-light">
                    <div class="announcement-card bg-glass-blue text-dark p-4 rounded-4 mb-3 d-flex align-items-center shadow-sm">
                        <i class="bi bi-info-circle-fill text-info fs-2 me-3"></i>
                        <div>
                            <strong>Rapat Bulanan Staf Medis</strong><br>
                            Jumat, 15 Desember 2023 pukul 14.00<br>
                            <small class="text-muted">Ruang Rapat Utama</small>
                        </div>
                    </div>
                    <div class="announcement-card bg-glass-green text-dark p-4 rounded-4 d-flex align-items-center shadow-sm">
                        <i class="bi bi-check-circle-fill text-success fs-2 me-3"></i>
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

{{-- ===== STYLE ===== --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: #f5f8f6;
    }

    /* Glass effect */
    .bg-glass-green {
        background: rgba(56, 142, 60, 0.85);
        backdrop-filter: blur(10px);
    }

    .bg-glass-blue {
        background: rgba(33, 150, 243, 0.1);
        backdrop-filter: blur(12px);
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(8px);
    }

    .doctor-icon {
        width: 120px;
        right: 30px;
        bottom: 10px;
        opacity: 0.2;
    }

    /* Button gradient */
    .bg-success-gradient {
        background: linear-gradient(135deg, #4caf50, #2e7d32);
    }

    .bg-warning-gradient {
        background: linear-gradient(135deg, #ffeb3b, #fbc02d);
    }

    .btn-action {
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
    }

    /* Timeline */
    .timeline {
        border-left: 3px solid #dee2e6;
        margin-left: 12px;
        padding-left: 20px;
    }
    .timeline-item {
        position: relative;
        margin-bottom: 25px;
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

    /* Announcement */
    .announcement-card {
        transition: all 0.3s ease;
    }

    .announcement-card:hover {
        transform: scale(1.02);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
</style>

{{-- ===== SCRIPT ===== --}}
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
