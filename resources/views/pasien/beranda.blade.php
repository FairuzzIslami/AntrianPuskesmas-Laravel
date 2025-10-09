<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien - Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        }
        main {
            flex: 1;
        }
        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
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
    <main class="container-lg my-4">
        <!-- Header Welcome -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-3 bg-gradient-primary">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="fw-bold text-white mb-2">Selamat Datang, Pasien</h2>
                                <p class="text-light mb-0">Anda login sebagai <span class="badge bg-light text-primary fs-6">Pasien</span></p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                    <i class="fas fa-user-injured text-white fs-2"></i>
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
                </div>
            </div>
        </div>

        <!-- Informasi Dokter -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="section-title">Daftar Dokter Sesuai Poli</h2>
            </div>
            
            <div class="col-lg-6 mb-4">
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
            
            <div class="col-lg-6 mb-4">
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
            
            <div class="col-lg-6 mb-4">
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
</body>
</html>