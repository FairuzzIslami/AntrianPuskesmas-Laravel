<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .navbar-nav .nav-item {
            margin-right: 0.5rem;
        }
        .footer {
            margin-top: auto;
        }
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        main {
            flex: 1;
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }
        .bg-gradient-success {
            background: linear-gradient(135deg, #43a047 0%, #2e7d32 100%) !important;
        }
        .hover-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
        }
        .card {
            border: none;
            transition: all 0.3s ease;
            border-radius: 12px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-3px);
        }
        .poli-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 10px;
            overflow: hidden;
        }
        .poli-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .section-title {
            border-bottom: 2px solid #198754;
            padding-bottom: 10px;
            margin-bottom: 25px;
            color: #198754;
        }
        .doctor-card {
            border-left: 4px solid #198754;
            background-color: #f8f9fa;
        }
        .availability-badge {
            font-size: 0.85rem;
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
        h2, h5 {
            font-family: 'Poppins', sans-serif;
        }
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
        .rounded-4 {
            border-radius: 12px !important;
        }
    </style>
</head>
<body>
    <!-- Navbar khusus pasien -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('pasien.beranda') }}">
                <i class="fas fa-clinic-medical me-2"></i>Sistem Antrian Puskesmas
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarPasien" aria-controls="navbarPasien" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarPasien">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('pasien.beranda') }}" 
                           class="nav-link px-3 active">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3" href="#" role="button" 
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-clinic-medical me-1"></i>Pilih Poli
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('pasien.poli_anak') }}">Poli Anak</a></li>
                            <li><a class="dropdown-item" href="{{ route('pasien.poli_gigi') }}">Poli Gigi</a></li>
                            <li><a class="dropdown-item" href="{{ route('pasien.poli_umum') }}">Poli Umum</a></li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm ms-2">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <main class="container-lg my-4 animate__animated animate__fadeIn">
        <!-- Header Welcome -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow border-0 rounded-4 overflow-hidden">
                    <div class="card-body bg-gradient-success text-white p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="fw-bold mb-2">Selamat Datang, Pasien 👋</h2>
                                <p class="mb-0 text-white-50">Semoga hari Anda menyenangkan. Berikut layanan kesehatan yang tersedia untuk Anda.</p>
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

        <!-- Tindakan Cepat -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-header bg-success text-white rounded-top-4">
                        <h5 class="card-title mb-0"><i class="fas fa-bolt me-2"></i>Tindakan Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <a href="{{ route('pasien.poli_umum') }}"
                                   class="btn btn-gradient-success w-100 py-3 shadow-sm rounded-3 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fas fa-stethoscope fa-lg"></i>
                                    <div class="text-start">
                                        <div class="fw-bold text-white">Poli Umum</div>
                                        <small class="text-white-50">Konsultasi penyakit umum</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('pasien.poli_gigi') }}"
                                   class="btn btn-gradient-warning w-100 py-3 shadow-sm rounded-3 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fas fa-tooth fa-lg"></i>
                                    <div class="text-start">
                                        <div class="fw-bold text-dark">Poli Gigi</div>
                                        <small class="text-muted">Perawatan kesehatan gigi</small>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('pasien.poli_anak') }}"
                                   class="btn btn-outline-success w-100 py-3 shadow-sm rounded-3 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fas fa-baby fa-lg"></i>
                                    <div class="text-start">
                                        <div class="fw-bold">Poli Anak</div>
                                        <small class="text-muted">Kesehatan ibu & anak</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Panduan Layanan Poli -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="fw-semibold text-dark mb-3">Panduan Layanan Poli</h4>
                <div class="row g-3">
                    <!-- Poli Umum -->
                    <div class="col-md-3 col-6">
                        <a href="{{ route('pasien.poli_umum') }}" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm rounded-3 hover-card">
                                <div class="card-body text-center p-3">
                                    <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-stethoscope text-primary fs-4"></i>
                                    </div>
                                    <h6 class="fw-semibold mb-1">Poli Umum</h6>
                                    <p class="text-muted small mb-0">Penyakit umum & konsultasi dasar</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Poli Gigi -->
                    <div class="col-md-3 col-6">
                        <a href="{{ route('pasien.poli_gigi') }}" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm rounded-3 hover-card">
                                <div class="card-body text-center p-3">
                                    <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-tooth text-success fs-4"></i>
                                    </div>
                                    <h6 class="fw-semibold mb-1">Poli Gigi</h6>
                                    <p class="text-muted small mb-0">Perawatan & konsultasi kesehatan gigi</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <!-- Poli Ibu & Anak -->
                    <div class="col-md-3 col-6">
                        <a href="{{ route('pasien.poli_anak') }}" class="text-decoration-none text-dark">
                            <div class="card h-100 border-0 shadow-sm rounded-3 hover-card">
                                <div class="card-body text-center p-3">
                                    <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                        <i class="fas fa-baby text-warning fs-4"></i>
                                    </div>
                                    <h6 class="fw-semibold mb-1">Poli Ibu & Anak</h6>
                                    <p class="text-muted small mb-0">Kesehatan ibu, anak, & imunisasi</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <!-- Informasi Antrian -->
                    <div class="col-md-3 col-6">
                        <div class="card h-100 border-0 shadow-sm rounded-3 bg-light">
                            <div class="card-body text-center p-3">
                                <div class="bg-info bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="fas fa-info-circle text-info fs-4"></i>
                                </div>
                                <h6 class="fw-semibold mb-1">Informasi Antrian</h6>
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
                    <div class="card-header bg-success text-white rounded-top-4">
                        <h5 class="card-title mb-0"><i class="fas fa-user-md me-2"></i>Daftar Dokter Sesuai Poli</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="card doctor-card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="card-title text-success">Poli Umum</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">dr. Zulfiadi</h6>
                                            </div>
                                            <span class="badge bg-success">Tersedia</span>
                                        </div>
                                        <p class="card-text mt-3">
                                            <i class="fas fa-calendar-alt me-2 text-muted"></i>Senin - Jumat<br>
                                            <i class="fas fa-clock me-2 text-muted"></i>07:30 - 14:00 WIB
                                        </p>
                                        <a href="{{ route('pasien.poli_umum') }}" class="btn btn-sm btn-outline-success mt-2">Daftar Antrian</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <div class="card doctor-card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="card-title text-info">Poli Gigi</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">drg. Dokter 1</h6>
                                            </div>
                                            <span class="badge bg-success">Tersedia</span>
                                        </div>
                                        <p class="card-text mt-3">
                                            <i class="fas fa-calendar-alt me-2 text-muted"></i>Senin - Kamis<br>
                                            <i class="fas fa-clock me-2 text-muted"></i>08:00 - 12:00 WIB
                                        </p>
                                        <a href="{{ route('pasien.poli_gigi') }}" class="btn btn-sm btn-outline-info mt-2">Daftar Antrian</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="card doctor-card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h5 class="card-title text-warning">Poli Anak</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">dr. Dokter 2</h6>
                                            </div>
                                            <span class="badge bg-success">Tersedia</span>
                                        </div>
                                        <p class="card-text mt-3">
                                            <i class="fas fa-calendar-alt me-2 text-muted"></i>Setiap Hari<br>
                                            <i class="fas fa-clock me-2 text-muted"></i>08:00 - 14:00 WIB
                                        </p>
                                        <a href="{{ route('pasien.poli_anak') }}" class="btn btn-sm btn-outline-warning mt-2">Daftar Antrian</a>
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
                        <h5 class="card-title mb-0"><i class="fas fa-calendar-day me-2"></i>Jadwal Hari Ini</h5>
                    </div>
                    <div class="card-body">
                        <ul class="timeline list-unstyled mb-0">
                            <li class="timeline-item">
                                <span class="timeline-marker bg-primary"></span>
                                <div class="timeline-content">
                                    <h6 class="fw-bold text-primary">08:00 - 10:00</h6>
                                    <p class="mb-1">Poli Umum</p>
                                    <small class="text-muted">dr. Zulfiadi</small>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-marker bg-success"></span>
                                <div class="timeline-content">
                                    <h6 class="fw-bold text-success">10:30 - 12:00</h6>
                                    <p class="mb-1">Poli Gigi</p>
                                    <small class="text-muted">drg. Dokter 1</small>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-marker bg-warning"></span>
                                <div class="timeline-content">
                                    <h6 class="fw-bold text-warning">13:30 - 15:00</h6>
                                    <p class="mb-1">Poli Anak</p>
                                    <small class="text-muted">dr. Dokter 2</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="row">
            <div class="col-12 text-center py-4 bg-light rounded">
                <h3 class="text-success mb-3">Siap Melayani</h3>
                <p class="lead mb-4">Kami berkomitmen memberikan pelayanan kesehatan terbaik untuk Anda dan keluarga</p>
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <a href="{{ route('pasien.poli_umum') }}" class="btn btn-success btn-lg">
                        <i class="fas fa-calendar-plus me-2"></i>Daftar Antrian
                    </a>
                    <a href="{{ route('pasien.beranda') }}" class="btn btn-outline-success btn-lg">
                        <i class="fas fa-home me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center py-4 mt-5 border-top footer">
        <div class="container">
            <p class="mb-0 text-muted">
                &copy; {{ date('Y') }} Sistem Antrian Puskesmas | Hak Cipta Dilindungi
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>