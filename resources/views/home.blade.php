@extends('layout.layout')

@section('title', 'Home Puskesmas')


@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --hijau: #2ecc71;
            --hijau-gelap: #27ae60;
            --biru: #3498db;
            --biru-gelap: #2980b9;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--biru) !important;
            font-weight: 700;
        }

        .nav-link {
            color: #555 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--biru) !important;
        }

        .hero-section {
            background: linear-gradient(rgba(52, 152, 219, 0.8), rgba(46, 204, 113, 0.8)), url('https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            text-align: center;
            margin-top: 76px;
        }

        .btn-primary {
            background-color: var(--biru);
            border-color: var(--biru);
        }

        .btn-primary:hover {
            background-color: var(--biru-gelap);
            border-color: var(--biru-gelap);
        }

        .btn-login {
            background-color: #2ecc71 !important;
            /* hijau terang sama seperti di Home */
            border-color: #2ecc71 !important;
            color: #fff !important;
        }

        .btn-login:hover {
            background-color: #27ae60 !important;
            /* hijau sedikit gelap saat hover */
            border-color: #27ae60 !important;
        }

        .feature-card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .bg-biru {
            background-color: var(--biru);
        }

        .bg-hijau {
            background-color: var(--hijau);
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--biru);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
        }

        footer {
            background: linear-gradient(135deg, var(--biru) 0%, var(--hijau) 100%);
            color: white;
        }

        .text-biru {
            color: var(--biru);
        }

        .text-hijau {
            color: var(--hijau);
        }

        .active-nav {
            color: var(--biru) !important;
            font-weight: 600;
        }
    </style>
    </head>

    <body>
        <!-- Navbar -->
        @extends('layout.nav')

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold mb-4">Solusi Terbaik untuk Layanan Kesehatan Digital Anda</h1>
                        <p class="lead mb-5">Kami hadir dengan solusi antrian digital terbaik untuk mendukung kebutuhan
                            layanan kesehatan Anda. Proses aman, pengelolaan mudah, dan akses yang responsif kapan saja.
                        </p>
                        <a href="#" class="btn btn-login px-5 py-3 fw-bold">Silahkan Login Terlebih
                            Dahulu</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Mengapa Memilih Layanan Kami?</h2>
                    <p class="text-muted">Kami memberikan pengalaman terbaik dalam pengambilan antrian puskesmas</p>
                </div>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card feature-card h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon text-biru">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <h4 class="fw-bold">Hemat Waktu</h4>
                                <p class="text-muted">Tidak perlu datang lebih awal, ambil antrian secara online dan
                                    datang
                                    sesuai jadwal</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card feature-card h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon text-hijau">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h4 class="fw-bold">Aman dan Terjamin</h4>
                                <p class="text-muted">Sistem kami menjamin data pribadi Anda tetap aman dan terenkripsi
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card feature-card h-100">
                            <div class="card-body text-center p-4">
                                <div class="feature-icon text-biru">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <h4 class="fw-bold">Akses Mudah</h4>
                                <p class="text-muted">Akses layanan antrian kapan saja dan di mana saja melalui
                                    smartphone
                                    Anda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Cara Menggunakan Layanan</h2>
                    <p class="text-muted">Hanya dengan 3 langkah mudah, dapatkan antrian Anda</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-4">
                            <div class="step-number">1</div>
                            <div>
                                <h4 class="fw-bold">Login</h4>
                                <p class="text-muted mb-0">Lakukan pendaftaran akun anda</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="step-number">2</div>
                            <div>
                                <h4 class="fw-bold">Pilih Layanan dan Jadwal</h4>
                                <p class="text-muted mb-0">Pilih jenis layanan kesehatan dan jadwal kunjungan yang
                                    diinginkan</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-4">
                            <div class="step-number">3</div>
                            <div>
                                <h4 class="fw-bold">Ambil Antrian</h4>
                                <p class="text-muted mb-0">Dapatkan nomor antrian elektronik dan tunjukkan saat datang
                                    ke
                                    puskesmas</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

            <!-- Footer -->


            <!-- Scripts -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        @endsection
