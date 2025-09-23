@extends('layout.layout')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            color: #555;
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

        .active-nav {
            color: var(--biru) !important;
            font-weight: 600;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(52, 152, 219, 0.85), rgba(46, 204, 113, 0.85));   
            background-position: center;
            padding: 100px 0;
            color: white;
            text-align: center;
            margin-top: 76px;
        }

        .hero-section h1,
        .hero-section p {
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
        }

        .hero-section h1 {
            animation-delay: 0.2s;
        }

        .hero-section p {
            animation-delay: 0.4s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Feature Cards */
        .feature-card {
            border-radius: 12px;
            transition: all 0.3s ease-in-out;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            height: 100%;
            background: #fff;
        }

        .feature-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            width: 70px;
            height: 70px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--biru), var(--hijau));
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s;
        }

        .feature-card:hover .feature-icon {
            transform: rotate(10deg) scale(1.1);
        }

        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(to right, var(--biru), var(--hijau));
            border-radius: 3px;
        }

        footer {
            background: linear-gradient(135deg, var(--biru) 0%, var(--hijau) 100%);
            color: white;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>

    <body>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold mb-4">Fitur Unggulan Layanan Kami</h1>
                        <p class="lead mb-5">Temukan berbagai fitur inovatif yang membuat pengalaman layanan kesehatan
                            digital Anda lebih mudah, aman, dan efisien.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold section-title">Fitur Unggulan</h2>
                    <p class="text-muted">Website ini dirancang dengan berbagai fitur yang memudahkan Anda dalam mengakses
                        layanan secara online.</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card feature-card text-center p-4">
                            <div class="feature-icon"><i class="bi bi-speedometer2"></i></div>
                            <h4 class="fw-bold mb-3">Mudah Digunakan</h4>
                            <p class="text-muted">Antarmuka yang sederhana dan ramah pengguna sehingga mudah dipahami
                                oleh semua kalangan.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card feature-card text-center p-4">
                            <div class="feature-icon"><i class="bi bi-shield-lock"></i></div>
                            <h4 class="fw-bold mb-3">Keamanan Data</h4>
                            <p class="text-muted">Data Anda disimpan dengan aman menggunakan teknologi enkripsi tingkat
                                tinggi.</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card feature-card text-center p-4">
                            <div class="feature-icon"><i class="bi bi-phone"></i></div>
                            <h4 class="fw-bold mb-3">Responsif</h4>
                            <p class="text-muted">Dapat diakses dengan nyaman melalui berbagai perangkat dan ukuran
                                layar.</p>
                        </div>
                    </div>
                </div>

                <div class="row g-4 mt-3">
                    <div class="col-md-6">
                        <div class="card feature-card text-center p-4">
                            <div class="feature-icon"><i class="bi bi-lightning"></i></div>
                            <h4 class="fw-bold mb-3">Akses Cepat</h4>
                            <p class="text-muted">Optimasi performa terbaik untuk loading cepat dan pengalaman tanpa
                                hambatan.</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card feature-card text-center p-4">
                            <div class="feature-icon"><i class="bi bi-globe"></i></div>
                            <h4 class="fw-bold mb-3">Layanan Online</h4>
                            <p class="text-muted">Nikmati semua layanan secara online tanpa harus datang langsung, kapan
                                saja dan di mana saja.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="/register" class="btn btn-primary px-4 py-2 fw-bold">Coba Sekarang</a>
                </div>
            </div>
        </section>

        <!-- Additional Features Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold section-title">Keunggulan Lainnya</h2>
                    <p class="text-muted">Berbagai keunggulan yang membuat layanan kami menjadi pilihan terbaik</p>
                </div>

                <div class="row g-4 text-center">
                    <div class="col-md-3">
                        <div class="feature-icon mb-3"><i class="bi bi-bell"></i></div>
                        <h5 class="fw-bold">Notifikasi Real-time</h5>
                        <p class="text-muted small">Dapatkan pemberitahuan status antrian secara real-time</p>
                    </div>

                    <div class="col-md-3">
                        <div class="feature-icon mb-3"><i class="bi bi-calendar-check"></i></div>
                        <h5 class="fw-bold">Jadwal Fleksibel</h5>
                        <p class="text-muted small">Atur jadwal kunjungan sesuai waktu yang Anda inginkan</p>
                    </div>

                    <div class="col-md-3">
                        <div class="feature-icon mb-3"><i class="bi bi-file-text"></i></div>
                        <h5 class="fw-bold">Riwayat Digital</h5>
                        <p class="text-muted small">Akses riwayat kunjungan dan antrian secara digital</p>
                    </div>

                    <div class="col-md-3">
                        <div class="feature-icon mb-3"><i class="bi bi-chat-dots"></i></div>
                        <h5 class="fw-bold">Dukungan Pelanggan</h5>
                        <p class="text-muted small">Tim support siap membantu Anda 24/7</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-white pt-5">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <img src="{{ asset('asset/img/logo.jpg') }}" alt="Logo Puskesmas" class="mb-3"
                            style="max-width: 100px;">
                        <p class="small">
                            Sistem antrian digital untuk pelayanan Puskesmas yang lebih tertib, cepat, dan transparan.
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h5 class="fw-bold mb-3">Menu</h5>
                        <ul class="list-unstyled">
                            <li><a href="/" class="text-decoration-none text-white d-block mb-2">Beranda</a></li>
                            <li><a href="/tentang" class="text-decoration-none text-white d-block mb-2">Tentang</a></li>
                            <li><a href="/fitur" class="text-decoration-none text-white d-block mb-2">Fitur</a></li>
                            <li><a href="/kontak" class="text-decoration-none text-white d-block mb-2">Kontak</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h5 class="fw-bold mb-3">Layanan</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-decoration-none text-white d-block mb-2">Poli Umum</a></li>
                            <li><a href="#" class="text-decoration-none text-white d-block mb-2">Poli Gigi</a></li>
                            <li><a href="#" class="text-decoration-none text-white d-block mb-2">Poli Anak</a></li>
                            <li><a href="#" class="text-decoration-none text-white d-block mb-2">Laboratorium</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h5 class="fw-bold mb-3">Kontak Kami</h5>
                        <p class="small mb-2"><i class="bi bi-geo-alt"></i> Jl. Kesehatan No. 12, Jakarta</p>
                        <p class="small mb-2"><i class="bi bi-envelope"></i> puskesmas@email.com</p>
                        <p class="small mb-2"><i class="bi bi-telephone"></i> (021) 123-4567</p>
                        <div class="mt-2">
                            <a href="https://wa.me/6285799690454" target="_blank" class="me-3 text-white"><i
                                    class="bi bi-whatsapp fs-5"></i></a>
                            <a href="#" class="me-3 text-white"><i class="bi bi-facebook fs-5"></i></a>
                            <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
                        </div>
                    </div>
                </div>

                <hr class="border-light mt-4">
                <div class="text-center pb-3">
                    <small>© 2025 <span class="fw-bold">Puskesmas Digital</span>. All Rights Reserved.</small>
                </div>
            </div>
        </footer>

        <!-- Floating WhatsApp -->
        <a href="https://wa.me/6285799690454" target="_blank" class="position-fixed"
            style="bottom:20px; right:20px; background:#25D366; color:white;
          padding:12px 16px; border-radius:50%; box-shadow:0 4px 10px rgba(0,0,0,0.2); z-index:1000;">
            <i class="bi bi-whatsapp fs-4"></i>
        </a>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
@endsection
