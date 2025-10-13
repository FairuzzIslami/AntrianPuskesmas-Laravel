@extends('layout.pasien')

@section('title', 'Pasien - Beranda')

@section('content')
<main class="container-lg my-4 animate__animated animate__fadeIn">
    <!-- Header Welcome -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow border-0 rounded-4 overflow-hidden">
                <div class="card-body bg-gradient-primary text-white p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold mb-2">Selamat Datang, Pasien 👋</h2>
                            <p class="mb-0 text-white-50">
                                Semoga hari Anda menyenangkan. Berikut layanan kesehatan yang tersedia untuk Anda.
                            </p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-white text-primary rounded-4 shadow-sm px-4 py-3 d-inline-block">
                                <h4 class="mb-0 fw-bold" id="current-time">00:00:00</h4>
                                <small id="current-date" class="text-muted">Hari, Tanggal</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tindakan Cepat -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="card-title mb-0"><i class="bi bi-lightning me-2"></i>Tindakan Cepat</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3 col-6">
                            <div class="card h-100 border-0 shadow-sm rounded-3 hover-card bg-primary bg-opacity-5">
                                <div class="card-body text-center p-3">
                                    <div class="bg-primary rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="bi bi-calendar-plus text-white fs-5"></i>
                                    </div>
                                    <h6 class="fw-semibold mb-1 text-primary">Daftar Antrian</h6>
                                    <p class="text-muted small mb-0">Daftar antrian poli</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card h-100 border-0 shadow-sm rounded-3 hover-card bg-success bg-opacity-5">
                                <div class="card-body text-center p-3">
                                    <div class="bg-success rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="bi bi-clock-history text-white fs-5"></i>
                                    </div>
                                    <h6 class="fw-semibold mb-1 text-success">Status Antrian</h6>
                                    <p class="text-muted small mb-0">Lihat status antrian</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card h-100 border-0 shadow-sm rounded-3 hover-card bg-info bg-opacity-5">
                                <div class="card-body text-center p-3">
                                    <div class="bg-info rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="bi bi-calendar-check text-white fs-5"></i>
                                    </div>
                                    <h6 class="fw-semibold mb-1 text-info">Jadwal Dokter</h6>
                                    <p class="text-muted small mb-0">Lihat jadwal praktik</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="card h-100 border-0 shadow-sm rounded-3 hover-card bg-warning bg-opacity-5">
                                <div class="card-body text-center p-3">
                                    <div class="bg-warning rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="bi bi-info-circle text-white fs-5"></i>
                                    </div>
                                    <h6 class="fw-semibold mb-1 text-warning">Informasi</h6>
                                    <p class="text-muted small mb-0">Informasi layanan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Panduan Layanan Poli -->
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-semibold text-dark mb-3"><i class="bi bi-hospital me-2 text-primary"></i>Panduan Layanan Poli</h4>
            <div class="row g-3">
                <!-- Poli Umum -->
                <div class="col-md-3 col-6">
                    <div class="card h-100 border-0 shadow-sm rounded-3 hover-card">
                        <div class="card-body text-center p-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-heart-pulse text-primary fs-4"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-primary">Poli Umum</h6>
                            <p class="text-muted small mb-0">Penyakit umum & konsultasi dasar</p>
                        </div>
                    </div>
                </div>

                <!-- Poli Gigi -->
                <div class="col-md-3 col-6">
                    <div class="card h-100 border-0 shadow-sm rounded-3 hover-card">
                        <div class="card-body text-center p-3">
                            <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-tooth text-success fs-4"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-success">Poli Gigi</h6>
                            <p class="text-muted small mb-0">Perawatan & konsultasi kesehatan gigi</p>
                        </div>
                    </div>
                </div>

                <!-- Poli Ibu & Anak -->
                <div class="col-md-3 col-6">
                    <div class="card h-100 border-0 shadow-sm rounded-3 hover-card">
                        <div class="card-body text-center p-3">
                            <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-heart text-warning fs-4"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-warning">Poli Ibu & Anak</h6>
                            <p class="text-muted small mb-0">Kesehatan ibu, anak, & imunisasi</p>
                        </div>
                    </div>
                </div>
                
                <!-- Informasi Antrian -->
                <div class="col-md-3 col-6">
                    <div class="card h-100 border-0 shadow-sm rounded-3 bg-light">
                        <div class="card-body text-center p-3">
                            <div class="bg-info bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="bi bi-info-circle text-info fs-4"></i>
                            </div>
                            <h6 class="fw-semibold mb-1 text-info">Informasi Antrian</h6>
                            <p class="text-muted small mb-0">Lihat status antrian Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Dokter & Jadwal -->
    <div class="row mb-5">
        <!-- Informasi Dokter -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow rounded-4 border-0 h-100">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h5 class="card-title mb-0"><i class="bi bi-person-badge me-2"></i>Daftar Dokter Sesuai Poli</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div>
                                            <h5 class="card-title text-primary mb-1">Poli Umum</h5>
                                            <h6 class="card-subtitle text-muted">dr. Zulfiadi</h6>
                                        </div>
                                        <span class="badge bg-primary">Tersedia</span>
                                    </div>
                                    <p class="card-text mb-3">
                                        <i class="bi bi-calendar-week me-2 text-muted"></i>Senin - Jumat<br>
                                        <i class="bi bi-clock me-2 text-muted"></i>07:30 - 14:00 WIB
                                    </p>
                                    <a href="#" class="btn btn-sm btn-primary mt-2">Daftar Antrian</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div>
                                            <h5 class="card-title text-success mb-1">Poli Gigi</h5>
                                            <h6 class="card-subtitle text-muted">drg. Dokter 1</h6>
                                        </div>
                                        <span class="badge bg-success">Tersedia</span>
                                    </div>
                                    <p class="card-text mb-3">
                                        <i class="bi bi-calendar-week me-2 text-muted"></i>Senin - Kamis<br>
                                        <i class="bi bi-clock me-2 text-muted"></i>08:00 - 12:00 WIB
                                    </p>
                                    <a href="#" class="btn btn-sm btn-success mt-2">Daftar Antrian</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <div>
                                            <h5 class="card-title text-warning mb-1">Poli Anak</h5>
                                            <h6 class="card-subtitle text-muted">dr. Dokter 2</h6>
                                        </div>
                                        <span class="badge bg-warning">Tersedia</span>
                                    </div>
                                    <p class="card-text mb-3">
                                        <i class="bi bi-calendar-week me-2 text-muted"></i>Setiap Hari<br>
                                        <i class="bi bi-clock me-2 text-muted"></i>08:00 - 14:00 WIB
                                    </p>
                                    <a href="#" class="btn btn-sm btn-warning text-white mt-2">Daftar Antrian</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jadwal Hari Ini -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow rounded-4 border-0 h-100">
                <div class="card-header bg-info text-white rounded-top-4">
                    <h5 class="card-title mb-0"><i class="bi bi-calendar-day me-2"></i>Jadwal Hari Ini</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-4 pb-3 border-bottom">
                            <div class="d-flex align-items-start">
                                <div class="bg-primary rounded-2 p-2 me-3">
                                    <i class="bi bi-clock text-white fs-6"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold text-primary mb-1">08:00 - 10:00</h6>
                                    <p class="mb-1 fw-semibold">Poli Umum</p>
                                    <small class="text-muted">dr. Zulfiadi</small>
                                </div>
                                <span class="badge bg-primary bg-opacity-10 text-primary">Berlangsung</span>
                            </div>
                        </li>
                        <li class="mb-4 pb-3 border-bottom">
                            <div class="d-flex align-items-start">
                                <div class="bg-success rounded-2 p-2 me-3">
                                    <i class="bi bi-clock text-white fs-6"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold text-success mb-1">10:30 - 12:00</h6>
                                    <p class="mb-1 fw-semibold">Poli Gigi</p>
                                    <small class="text-muted">drg. Dokter 1</small>
                                </div>
                                <span class="badge bg-success bg-opacity-10 text-success">Akan Datang</span>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="d-flex align-items-start">
                                <div class="bg-warning rounded-2 p-2 me-3">
                                    <i class="bi bi-clock text-white fs-6"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold text-warning mb-1">13:30 - 15:00</h6>
                                    <p class="mb-1 fw-semibold">Poli Anak</p>
                                    <small class="text-muted">dr. Dokter 2</small>
                                </div>
                                <span class="badge bg-warning bg-opacity-10 text-warning">Akan Datang</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow border-0 rounded-4 bg-gradient-primary text-white">
                <div class="card-body text-center p-5">
                    <h3 class="fw-bold mb-3">Siap Melayani Kesehatan Anda</h3>
                    <p class="lead mb-4 opacity-75">Kami berkomitmen memberikan pelayanan kesehatan terbaik untuk Anda dan keluarga</p>
                    <div class="d-flex justify-content-center flex-wrap gap-3">
                        <a href="#" class="btn btn-light btn-lg text-primary fw-semibold">
                            <i class="bi bi-calendar-plus me-2"></i>Daftar Antrian
                        </a>
                        <a href="{{ route('pasien.beranda') }}" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-house me-2"></i>Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    .hover-card {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%) !important;
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .btn {
        border-radius: 8px;
        font-weight: 500;
    }
    
    .badge {
        font-size: 0.75em;
        font-weight: 500;
    }
</style>

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