@extends('layout.layout')

@section('title', 'Tentang Puskesmas')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
            <img src="{{ asset('asset/img/logo.jpg') }}" alt="Logo" width="35" class="me-2 rounded-circle">
            <span class="text-gradient">Puskesmas Digital</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNav">
            <ul class="navbar-nav ms-auto text-center">
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold active-link" href="{{ url('/tentang') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#fitur">Fitur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#kontak">Kontak</a>
                </li>
                <li>
                    <a href="" class="btn btn-gradient fw-bold text-white shadow">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Profil (Full Background) --}}
<section class="profile-section">
    <div class="overlay"></div>
    <div class="content text-center">
        <h2 class="mb-3 section-title text-white">Profil Puskesmas</h2>
        <p class="lead text-white">
            Puskesmas Sehat Selalu berdiri sejak tahun 1990 sebagai pusat layanan kesehatan masyarakat.
            Dengan visi <strong>“Melayani dengan Ikhlas dan Profesional”</strong>, kami berkomitmen 
            memberikan pelayanan kesehatan terbaik kepada seluruh masyarakat.
        </p>
    </div>
</section>

<div class="gradient-bg text-white py-5">
    <div class="container">

        {{-- Poli --}}
        <section class="mb-5">
            <h2 class="text-center mb-4 section-title">Poli yang Tersedia</h2>
            <div class="row g-4">
                @php
                    $polis = [
                        ['Poli Umum', 'bi-clipboard2-pulse', 'Melayani pemeriksaan kesehatan umum, konsultasi, dan pengobatan ringan.'],
                        ['Poli Gigi', 'bi-emoji-smile', 'Menangani kesehatan gigi & mulut, pencabutan, penambalan, scaling.'],
                        ['Poli KIA (Ibu & Anak)', 'bi-gender-female', 'Pelayanan kehamilan, persalinan, imunisasi, tumbuh kembang anak.'],
                        ['Poli Lansia', 'bi-person-walking', 'Fokus pada kesehatan lansia, pemeriksaan rutin & pencegahan penyakit degeneratif.'],
                        ['Poli Gizi', 'bi-egg-fried', 'Konsultasi gizi seimbang, diet sehat, pencegahan stunting.'],
                        ['UGD', 'bi-hospital', 'Pelayanan gawat darurat 24 jam.']
                    ];
                @endphp
                @foreach ($polis as $poli)
                <div class="col-md-6 col-lg-4">
                    <div class="card poli-card shadow-sm h-100 text-dark">
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
        <section class="mb-5">
            <h2 class="text-center mb-4 section-title">Dokter & Petugas</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow h-100 text-dark">
                        <img src="{{ asset('asset/img/dokter_umum.jpeg') }}" class="card-img-top doctor-img" alt="Dokter Umum">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">dr. Andi</h5>
                            <p class="mb-1"><span class="badge bg-primary">Poli Umum</span></p>
                            <p class="text-muted mb-1">Senin – Jumat | 08.00 – 16.00</p>
                            <p class="small">Dokter umum dengan pengalaman >10 tahun.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow h-100 text-dark">
                        <img src="{{ asset('asset/img/dokter_gigi.jpeg') }}" class="card-img-top doctor-img" alt="Dokter Gigi">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">drg. Sinta</h5>
                            <p class="mb-1"><span class="badge bg-success">Poli Gigi</span></p>
                            <p class="text-muted mb-1">Selasa & Kamis | 09.00 – 15.00</p>
                            <p class="small">Spesialis kesehatan gigi & mulut.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow h-100 text-dark">
                        <img src="{{ asset('asset/img/bidan.jpeg') }}" class="card-img-top doctor-img" alt="Bidan Rani">
                        <div class="card-body text-center">
                            <h5 class="fw-bold">Bidan Rani</h5>
                            <p class="mb-1"><span class="badge bg-danger">Poli KIA</span></p>
                            <p class="text-muted mb-1">Setiap Hari | 08.00 – 13.00</p>
                            <p class="small">Berpengalaman dalam pemeriksaan kehamilan & imunisasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Struktur Organisasi --}}
        <section class="mb-5 bg-light rounded shadow p-4">
            <h2 class="text-center mb-5 section-title text-dark">Struktur Organisasi</h2>
            <div class="org-chart">
                <div class="org-node-wrapper">
                    <div class="org-node mx-auto bg-primary text-white">
                        <i class="bi bi-person-badge fs-1"></i>
                        <h5 class="fw-bold mt-2">Kepala Puskesmas</h5>
                        <p class="mb-0">dr. Bambang</p>
                    </div>
                </div>

                <div class="org-level">
                    <div class="org-node-wrapper">
                        <div class="org-node bg-success text-white">
                            <i class="bi bi-person-workspace fs-1"></i>
                            <h6 class="fw-bold mt-2">Kepala Tata Usaha</h6>
                            <p class="mb-0">Ibu Ratna</p>
                        </div>
                    </div>
                    <div class="org-node-wrapper">
                        <div class="org-node bg-danger text-white">
                            <i class="bi bi-diagram-3 fs-1"></i>
                            <h6 class="fw-bold mt-2">Penanggung Jawab Poli</h6>
                            <p class="mb-0">Sesuai Bidangnya</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Fasilitas --}}
        <section class="mb-5">
            <h2 class="text-center mb-4 section-title">Fasilitas</h2>
            <div class="row g-4">
                @php
                    $fasilitas = [
                        ['bi-people', 'Ruang Tunggu Nyaman', 'Ruang tunggu ber-AC dengan kursi empuk dan televisi.'],
                        ['bi-house', 'Apotek', 'Menyediakan obat-obatan lengkap dengan pelayanan ramah.'],
                        ['bi-droplet-half', 'Laboratorium', 'Tes kesehatan, pemeriksaan darah, urine, dan lainnya.'],
                        ['bi-truck-front', 'Ambulans', 'Siaga 24 jam untuk keadaan darurat.']
                    ];
                @endphp
                @foreach ($fasilitas as $item)
                <div class="col-md-6 col-lg-3">
                    <div class="facility-card shadow h-100 bg-white text-dark rounded text-center p-4">
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
        <section class="mb-5 bg-white text-dark rounded shadow p-4">
            <h2 class="text-center mb-4 section-title">Jadwal Pelayanan</h2>
            <table class="table table-bordered text-center bg-white text-dark">
                <thead class="table-gradient text-white">
                    <tr><th>Hari</th><th>Jam</th></tr>
                </thead>
                <tbody>
                    <tr><td>Senin - Jumat</td><td>08.00 - 16.00</td></tr>
                    <tr><td>Sabtu</td><td>08.00 - 12.00</td></tr>
                    <tr><td>Minggu & Libur Nasional</td><td>Tutup</td></tr>
                </tbody>
            </table>
        </section>

    </div>
</div>

<style>
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
    .hover-zoom { transition: transform 0.4s ease; }
    .hover-zoom:hover { transform: scale(1.05); }
    .section-title { font-weight: 700; }
    .table-gradient { background: linear-gradient(45deg, #20c997, #0d6efd); }
    .active-link { color: #0d6efd !important; }
    .doctor-img { height: 220px; object-fit: cover; }

    /* Poli Card */
    .poli-card {
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    .poli-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 18px rgba(0,0,0,0.15);
    }

    /* Fasilitas dengan Icon */
    .facility-card {
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    .facility-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    .icon-box {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        border-radius: 12px;
        background: linear-gradient(135deg, rgba(13,110,253,0.1), rgba(32,201,151,0.1));
    }

    /* Profil Background Full */
    .profile-section {
        position: relative;
        width: 100%;
        background: url('{{ asset("asset/img/puskesmas.jpeg") }}') center/cover no-repeat;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        overflow: hidden;
    }
    .profile-section .overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0,0,0,0.5);
    }
    .profile-section .content {
        position: relative;
        z-index: 1;
        padding: 60px 20px;
        max-width: 800px;
    }

    /* Struktur Organisasi */
    .org-chart { text-align: center; }
    .org-node {
        border-radius: 12px;
        padding: 15px;
        min-width: 200px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: 0.3s;
        display: inline-block;
        position: relative;
    }
    .org-node:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 22px rgba(0,0,0,0.2);
    }
    .org-node-wrapper { display: inline-block; position: relative; padding: 0 15px; }
    .org-level {
        margin-top: 50px;
        position: relative;
        white-space: nowrap;
    }
    .org-chart > .org-node-wrapper::after,
    .org-level .org-node-wrapper::before {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 25px;
        background: linear-gradient(180deg, #0d6efd, #20c997);
    }
    .org-chart > .org-node-wrapper::after { bottom: -25px; }
    .org-level .org-node-wrapper::before { top: -25px; }
    .org-level::before {
        content: '';
        position: absolute;
        top: -25px;
        left: 25%;
        right: 25%;
        height: 4px;
        background: linear-gradient(90deg, #0d6efd, #20c997);
    }
    .org-level .org-node-wrapper:first-child::before { left: 50%; }
    .org-level .org-node-wrapper:last-child::before { right: 50%; }
</style>
@endsection
