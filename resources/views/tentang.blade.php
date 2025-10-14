@extends('layout.layout')

@section('title', 'Tentang Puskesmas')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    {{-- Loading Animation --}}
    <div id="loading" class="loading-screen">
        <div class="loading-spinner">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 text-white">Memuat Halaman...</p>
        </div>
    </div>

    {{-- Profil (Full Background dengan Parallax) --}}
    <section class="profile-section parallax">
        <div class="overlay"></div>
        <div class="content text-center">
            <h2 class="mb-3 section-title text-white animate-fade-in">Profil Puskesmas</h2>
            <p class="lead text-white animate-slide-up">
                Puskesmas Sehat Selalu berdiri sejak tahun 1990 sebagai pusat layanan kesehatan masyarakat.
                Dengan visi <strong>"Melayani dengan Ikhlas dan Profesional"</strong>, kami berkomitmen
                memberikan pelayanan kesehatan terbaik kepada seluruh masyarakat.
            </p>
        </div>
    </section>

    <div class="gradient-bg text-white py-5">
        <div class="container">

            {{-- Poli --}}
            <section class="mb-5 animate-on-scroll">
                <h2 class="text-center mb-4 section-title">Poli yang Tersedia</h2>
                <div class="row g-4">
                    @php
                        $polis = [
                            [
                                'Poli Umum',
                                'bi-clipboard2-pulse',
                                'Melayani pemeriksaan kesehatan umum, konsultasi, dan pengobatan ringan.',
                            ],
                            [
                                'Poli Gigi',
                                'bi-emoji-smile',
                                'Menangani kesehatan gigi & mulut, pencabutan, penambalan, scaling.',
                            ],
                            [
                                'Poli KIA (Ibu & Anak)',
                                'bi-gender-female',
                                'Pelayanan kehamilan, persalinan, imunisasi, tumbuh kembang anak.',
                            ],
                            [
                                'Poli Lansia',
                                'bi-person-walking',
                                'Fokus pada kesehatan lansia, pemeriksaan rutin & pencegahan penyakit degeneratif.',
                            ],
                            ['Poli Gizi', 'bi-egg-fried', 'Konsultasi gizi seimbang, diet sehat, pencegahan stunting.'],
                            ['UGD', 'bi-hospital', 'Pelayanan gawat darurat 24 jam.'],
                        ];
                    @endphp
                    @foreach ($polis as $index => $poli)
                        <div class="col-md-6 col-lg-4">
                            <div class="card poli-card shadow-sm h-100 text-dark animate-card" data-delay="{{ $index * 100 }}">
                                <div class="card-body text-center">
                                    <i class="bi {{ $poli[1] }} display-4 text-gradient"></i>
                                    <h5 class="mt-3 fw-bold">{{ $poli[0] }}</h5>
                                    <p class="small text-muted">{{ $poli[2] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Dokter --}}
            <section class="mb-5 animate-on-scroll">
                <h2 class="text-center mb-4 section-title">Dokter & Petugas</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card shadow h-100 text-dark doctor-card animate-card" data-delay="0">
                            <div class="image-container">
                                <img src="{{ asset('asset/img/dokter1.jpeg') }}" class="card-img-top doctor-img lazy" alt="Dokter Umum">
                                <div class="image-overlay"></div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="fw-bold">drg Sri Lestari Handayani</h5>
                                <p class="mb-1"><span class="badge bg-primary">Poli Umum</span></p>
                                <p class="text-muted mb-1">Senin – Jumat | 08.00 – 16.00</p>
                                <p class="small">Dokter umum dengan pengalaman >10 tahun.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow h-100 text-dark doctor-card animate-card" data-delay="100">
                            <div class="image-container">
                                <img src="{{ asset('asset/img/dokter2.png') }}" class="card-img-top doctor-img lazy" alt="Dokter Gigi">
                                <div class="image-overlay"></div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="fw-bold">S. Wahyu Utama, S.Kep</h5>
                                <p class="mb-1"><span class="badge bg-success">Poli Gigi</span></p>
                                <p class="text-muted mb-1">Selasa & Kamis | 09.00 – 15.00</p>
                                <p class="small">Spesialis kesehatan gigi & mulut.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow h-100 text-dark doctor-card animate-card" data-delay="200">
                            <div class="image-container">
                                <img src="{{ asset('asset/img/bidan.jpeg') }}" class="card-img-top doctor-img lazy" alt="Bidan Rani">
                                <div class="image-overlay"></div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="fw-bold">Bidan Puan</h5>
                                <p class="mb-1"><span class="badge bg-danger">Poli KIA</span></p>
                                <p class="text-muted mb-1">Setiap Hari | 08.00 – 13.00</p>
                                <p class="small">Berpengalaman dalam pemeriksaan kehamilan & imunisasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Struktur Organisasi --}}
            <section class="mb-5 bg-light rounded shadow p-4 animate-on-scroll">
                <h2 class="text-center mb-5 section-title text-dark">Struktur Organisasi</h2>
                <div class="org-chart">
                    <div class="org-node-wrapper">
                        <div class="org-node mx-auto bg-primary text-white animate-card" data-delay="0">
                            <i class="bi bi-person-badge fs-1"></i>
                            <h5 class="fw-bold mt-2">Kepala Puskesmas</h5>
                            <p class="mb-0">drg Sri Lestari Handayani</p>
                        </div>
                    </div>

                    <div class="org-level">
                        <div class="org-node-wrapper">
                            <div class="org-node bg-success text-white animate-card" data-delay="100">
                                <i class="bi bi-person-workspace fs-1"></i>
                                <h6 class="fw-bold mt-2">Kepala Tata Usaha</h6>
                                <p class="mb-0">Ibu Ratna</p>
                            </div>
                        </div>
                        <div class="org-node-wrapper">
                            <div class="org-node bg-danger text-white animate-card" data-delay="200">
                                <i class="bi bi-diagram-3 fs-1"></i>
                                <h6 class="fw-bold mt-2">Penanggung Jawab Poli</h6>
                                <p class="mb-0">Sesuai Bidangnya</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Fasilitas --}}
            <section class="mb-5 animate-on-scroll">
                <h2 class="text-center mb-4 section-title">Fasilitas</h2>
                <div class="row g-4">
                    @php
                        $fasilitas = [
                            [
                                'bi-people',
                                'Ruang Tunggu Nyaman',
                                'Ruang tunggu ber-AC dengan kursi empuk dan televisi.',
                            ],
                            ['bi-house', 'Apotek', 'Menyediakan obat-obatan lengkap dengan pelayanan ramah.'],
                            [
                                'bi-droplet-half',
                                'Laboratorium',
                                'Tes kesehatan, pemeriksaan darah, urine, dan lainnya.',
                            ],
                            ['bi-truck-front', 'Ambulans', 'Siaga 24 jam untuk keadaan darurat.'],
                        ];
                    @endphp
                    @foreach ($fasilitas as $index => $item)
                        <div class="col-md-6 col-lg-3">
                            <div class="facility-card shadow h-100 bg-white text-dark rounded text-center p-4 animate-card" data-delay="{{ $index * 100 }}">
                                <div class="icon-box mb-3">
                                    <i class="bi {{ $item[0] }} display-3 text-gradient"></i>
                                </div>
                                <h6 class="fw-bold">{{ $item[1] }}</h6>
                                <p class="small text-muted">{{ $item[2] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            {{-- Jadwal --}}
            <section class="mb-5 bg-white text-dark rounded shadow p-4 animate-on-scroll">
                <h2 class="text-center mb-4 section-title">Jadwal Pelayanan</h2>
                <table class="table table-bordered text-center bg-white text-dark table-hover">
                    <thead class="table-gradient text-white">
                        <tr>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Senin - Jumat</td>
                            <td>08.00 - 16.00</td>
                        </tr>
                        <tr>
                            <td>Sabtu</td>
                            <td>08.00 - 12.00</td>
                        </tr>
                        <tr>
                            <td>Minggu & Libur Nasional</td>
                            <td>Tutup</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    
    {{-- WhatsApp Floating Button --}}
    <a href="https://wa.me/6285799690454" target="_blank" class="whatsapp-float animate-bounce">
        <i class="bi bi-whatsapp fs-4"></i>
    </a>

    <style>
        /* Animasi Dasar */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Loading Screen */
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #20c997, #0d6efd);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            transition: opacity 0.5s ease;
        }

        .loading-screen.hidden {
            opacity: 0;
            pointer-events: none;
        }

        .loading-spinner {
            text-align: center;
        }

        /* Animasi Class */
        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }

        .animate-slide-up {
            animation: slideUp 1s ease-out 0.3s both;
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .animate-card {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }

        .animate-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Efek Parallax */
        .parallax {
            background-attachment: fixed;
        }

        /* Gradient Background */
        .gradient-bg {
            background: linear-gradient(135deg, #20c997, #0d6efd);
        }

        .text-gradient {
            background: linear-gradient(45deg, #0d6efd, #20c997);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-gradient {
            background: linear-gradient(45deg, #20c997, #0d6efd);
            border: none;
            transition: 0.4s;
        }

        .btn-gradient:hover {
            background: linear-gradient(45deg, #0d6efd, #20c997);
            transform: scale(1.05);
        }

        .hover-zoom {
            transition: transform 0.4s ease;
        }

        .hover-zoom:hover {
            transform: scale(1.05);
        }

        .section-title {
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, #20c997, #0d6efd);
        }

        .table-gradient {
            background: linear-gradient(45deg, #20c997, #0d6efd);
        }

        .active-link {
            color: #0d6efd !important;
        }

        /* Dokter Card dengan Efek Gambar */
        .doctor-img {
            height: 220px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .image-container {
            position: relative;
            overflow: hidden;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .doctor-card:hover .doctor-img {
            transform: scale(1.1);
        }

        .doctor-card:hover .image-overlay {
            opacity: 1;
        }

        /* Poli Card */
        .poli-card {
            border: none;
            border-radius: 15px;
            transition: all 0.4s ease;
            overflow: hidden;
        }

        .poli-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .poli-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(45deg, #0d6efd, #20c997);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .poli-card:hover::before {
            transform: scaleX(1);
        }

        /* Fasilitas dengan Icon */
        .facility-card {
            border-radius: 15px;
            transition: all 0.4s ease;
            overflow: hidden;
            position: relative;
        }

        .facility-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);
        }

        .facility-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(45deg, #0d6efd, #20c997);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.4s ease;
        }

        .facility-card:hover::after {
            transform: scaleX(1);
        }

        .icon-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 80px;
            height: 80px;
            border-radius: 12px;
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.1), rgba(32, 201, 151, 0.1));
            transition: transform 0.3s ease;
        }

        .facility-card:hover .icon-box {
            transform: scale(1.1) rotate(5deg);
        }

        /* Profil Background Full */
        .profile-section {
            position: relative;
            width: 100%;
            background: url('{{ asset('asset/img/puskesmas.jpeg') }}') center/cover no-repeat;
            min-height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            overflow: hidden;
        }

        .profile-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .profile-section .content {
            position: relative;
            z-index: 1;
            padding: 60px 20px;
            max-width: 800px;
        }

        /* Struktur Organisasi */
        .org-chart {
            text-align: center;
        }

        .org-node {
            border-radius: 12px;
            padding: 15px;
            min-width: 200px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: 0.4s;
            display: inline-block;
            position: relative;
        }

        .org-node:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .org-node-wrapper {
            display: inline-block;
            position: relative;
            padding: 0 15px;
        }

        .org-level {
            margin-top: 50px;
            position: relative;
            white-space: nowrap;
        }

        .org-chart>.org-node-wrapper::after,
        .org-level .org-node-wrapper::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 25px;
            background: linear-gradient(180deg, #0d6efd, #20c997);
        }

        .org-chart>.org-node-wrapper::after {
            bottom: -25px;
        }

        .org-level .org-node-wrapper::before {
            top: -25px;
        }

        .org-level::before {
            content: '';
            position: absolute;
            top: -25px;
            left: 25%;
            right: 25%;
            height: 4px;
            background: linear-gradient(90deg, #0d6efd, #20c997);
        }

        .org-level .org-node-wrapper:first-child::before {
            left: 50%;
        }

        .org-level .org-node-wrapper:last-child::before {
            right: 50%;
        }

        /* WhatsApp Float Button */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #25D366;
            color: white;
            padding: 12px 16px;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        /* Table Hover Effect */
        .table-hover tbody tr {
            transition: all 0.3s ease;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.1);
            transform: translateX(5px);
        }

        /* Responsiveness */
        @media (max-width: 991.98px) {
            .navbar-nav {
                margin-top: 15px;
            }

            .navbar-nav .nav-item {
                margin-bottom: 10px;
            }
        }

        @media (max-width: 768px) {
            .profile-section {
                min-height: 350px;
                padding: 40px 15px;
                background-attachment: scroll;
            }

            .profile-section .content h2 {
                font-size: 1.6rem;
            }

            .profile-section .content p {
                font-size: 0.95rem;
            }

            .doctor-img {
                height: 180px;
            }

            .org-node {
                min-width: 160px;
                padding: 10px;
            }

            /* Struktur Organisasi jadi vertikal di tablet/HP */
            .org-level {
                display: flex;
                flex-direction: column;
                align-items: center;
                white-space: normal;
                margin-top: 30px;
            }

            .org-level::before {
                display: none;
            }

            .org-level .org-node-wrapper {
                display: block;
                padding: 10px 0;
            }

            .org-level .org-node-wrapper::before {
                display: none;
            }

            .org-chart>.org-node-wrapper::after {
                display: none;
            }
        }

        @media (max-width: 576px) {
            .profile-section {
                min-height: 280px;
                padding: 30px 12px;
            }

            .profile-section .content h2 {
                font-size: 1.4rem;
            }

            .profile-section .content p {
                font-size: 0.9rem;
            }

            .doctor-img {
                height: 160px;
            }

            .poli-card,
            .facility-card {
                padding: 12px;
            }

            .icon-box {
                width: 60px;
                height: 60px;
            }

            .icon-box i {
                font-size: 1.8rem;
            }

            .org-node {
                min-width: 140px;
                padding: 8px;
            }
        }

        .btn-login {
            background-color: #2ecc71 !important;
            border-color: #2ecc71 !important;
            color: #fff !important;
        }

        .btn-login:hover {
            background-color: #27ae60 !important;
            border-color: #27ae60 !important;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hilangkan loading screen setelah halaman selesai dimuat
            setTimeout(function() {
                document.getElementById('loading').classList.add('hidden');
            }, 1000);

            // Animasi scroll
            const animateOnScroll = function() {
                const elements = document.querySelectorAll('.animate-on-scroll');
                
                elements.forEach(element => {
                    const elementTop = element.getBoundingClientRect().top;
                    const elementVisible = 150;
                    
                    if (elementTop < window.innerHeight - elementVisible) {
                        element.classList.add('visible');
                        
                        // Animate child cards with delay
                        const cards = element.querySelectorAll('.animate-card');
                        cards.forEach(card => {
                            const delay = card.getAttribute('data-delay') || 0;
                            setTimeout(() => {
                                card.classList.add('visible');
                            }, parseInt(delay));
                        });
                    }
                });
            };

            // Jalankan saat halaman dimuat dan saat di-scroll
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Jalankan sekali saat halaman dimuat

            // Lazy loading untuk gambar
            if ('IntersectionObserver' in window) {
                const lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove('lazy');
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                const lazyImages = document.querySelectorAll('img.lazy');
                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });
    </script>
@endsection