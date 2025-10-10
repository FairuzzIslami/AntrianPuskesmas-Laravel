@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container py-5">

        <!-- Header Selamat Datang -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card shadow border-0 rounded-4 overflow-hidden">
                    <!-- 🌿 Warna gradasi hijau -->
                    <div class="card-body text-white p-4"
                        style="background: linear-gradient(135deg, #28a745, #1e7e34);">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h2 class="fw-bold mb-2">
                                    Selamat Datang, {{ Auth::user()->name ?? 'Admin' }} 👋
                                </h2>
                                <p class="mb-0 text-light opacity-75">
                                    Semoga hari Anda produktif. Berikut ringkasan pengelolaan sistem hari ini.
                                </p>
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
            <div class="col-lg-6 mb-4">
                <!-- 🌿 Akses Cepat -->
                <div class="card shadow rounded-4 border-0 mb-4">
                    <div class="card-header bg-success text-white rounded-top-4">
                        <h5 class="card-title mb-0"><i class="bi bi-lightning-fill me-2"></i>Akses Cepat</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Tombol 1 -->
                            <div class="col-md-6">
                                <a href="{{ route('admin.dokter') }}"
                                    class="btn w-100 py-3 shadow-sm rounded-3 akses-cepat-btn">
                                    <i class="bi bi-person-badge fa-lg"></i>
                                    <div class="text-start">
                                        <div class="fw-bold">Kelola Dokter</div>
                                        <small>Tambah/Edit Data</small>
                                    </div>
                                </a>
                            </div>
                            <!-- Tombol 2 -->
                            <div class="col-md-6">
                                <a href="{{ route('admin.laporan') }}"
                                    class="btn w-100 py-3 shadow-sm rounded-3 akses-cepat-btn">
                                    <i class="bi bi-file-earmark-text fa-lg"></i>
                                    <div class="text-start">
                                        <div class="fw-bold">Kelola Laporan</div>
                                        <small>Pantau Data Sistem</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistik Sistem -->
                <div class="card shadow rounded-4 border-0">
                    <div class="card-header bg-success text-white rounded-top-4">
                        <h5 class="card-title mb-0"><i class="bi bi-bar-chart-line me-2"></i>Statistik Sistem</h5>
                    </div>
                    <div class="card-body">
                        <div class="row text-center">
                            <div class="col-6 col-md-4 mb-3">
                                <div class="p-3 bg-light rounded-4 shadow-sm">
                                    <i class="bi bi-person-fill text-success fs-3 mb-2"></i>
                                    <h6 class="fw-bold mb-0">24</h6>
                                    <small class="text-muted">Dokter</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="p-3 bg-light rounded-4 shadow-sm">
                                    <i class="bi bi-people-fill text-success fs-3 mb-2"></i>
                                    <h6 class="fw-bold mb-0">132</h6>
                                    <small class="text-muted">Pasien</small>
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="p-3 bg-light rounded-4 shadow-sm">
                                    <i class="bi bi-activity text-success fs-3 mb-2"></i>
                                    <h6 class="fw-bold mb-0">8</h6>
                                    <small class="text-muted">Laporan Baru</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Dokter Hari Ini -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-header bg-success text-white fw-bold d-flex align-items-center">
                        <i class="bi bi-calendar-week me-2"></i> Jadwal Dokter Hari Ini
                    </div>
                    <div class="card-body bg-light">
                        @php
                            $jadwalDokter = [
                                ['nama' => 'dr. Budi Santoso', 'poli' => 'Umum', 'jam' => '08.00 - 12.00'],
                                ['nama' => 'drg. Rina Wulandari', 'poli' => 'Gigi', 'jam' => '09.00 - 13.00'],
                                ['nama' => 'dr. Andi Pratama', 'poli' => 'Anak', 'jam' => '10.00 - 14.00'],
                                ['nama' => 'dr. Siti Nurhaliza', 'poli' => 'KIA', 'jam' => '07.30 - 11.30'],
                            ];
                        @endphp

                        @foreach ($jadwalDokter as $dokter)
                            <div
                                class="d-flex align-items-center justify-content-between bg-white rounded-3 shadow-sm p-3 mb-3">
                                <div>
                                    <h6 class="fw-bold mb-1 text-success">{{ $dokter['nama'] }}</h6>
                                    <small class="text-muted">Poli {{ $dokter['poli'] }}</small>
                                </div>
                                <span class="badge bg-success-subtle text-success border border-success px-3 py-2">
                                    {{ $dokter['jam'] }}
                                </span>
                            </div>
                        @endforeach

                        <div class="text-end mt-2">
                            <a href="#" class="text-decoration-none text-success small">
                                <i class="bi bi-arrow-right-circle"></i> Lihat Semua Jadwal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Efek Hover + Jam --}}
    <style>
        .akses-cepat-btn {
            background: linear-gradient(135deg, #28a745, #1e7e34);
            color: #fff;
            transition: all 0.3s ease;
        }

        .akses-cepat-btn:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #34d058, #23923f);
            box-shadow: 0 0 15px rgba(40, 167, 69, 0.4);
            color: #fff;
        }
    </style>

    <script>
        function updateTime() {
            const now = new Date();
            const time = now.toLocaleTimeString('id-ID', { hour12: false });
            const date = now.toLocaleDateString('id-ID', {
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
            document.getElementById('current-time').textContent = time;
            document.getElementById('current-date').textContent = date;
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>
@endsection
