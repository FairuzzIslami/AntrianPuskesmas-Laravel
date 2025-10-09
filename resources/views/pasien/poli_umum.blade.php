@extends('layout.pasien')

@section('title', 'Status Antrian - Poli Umum')

@section('content')
<div class="container py-4">
    <!-- Header Pasien -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 bg-gradient-primary">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold text-white mb-2">Selamat Datang, {{ $dataPasien['nama'] }}</h2>
                            <p class="text-light mb-0">Status antrian Anda di Poli Umum akan diperbarui secara real-time</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="fas fa-user-md text-white fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kartu Status Utama -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                        <i class="fas fa-bullhorn text-primary fs-1"></i>
                    </div>

                    @if($antrianAktif)
                        @if($antrianAktif->status == 'dipanggil')
                            <h2 class="fw-bold text-primary mb-3">ANTRIAN ANDA SEDANG DIPANGGIL</h2>
                            <div class="display-1 fw-bold text-gradient mb-3" style="color: #4e73df;">
                                A-{{ str_pad($antrianAktif->nomor_antrian, 3, '0', STR_PAD_LEFT) }}
                            </div>
                            <p class="text-muted mb-4">Silakan menuju ke ruangan Poli Umum 1</p>

                            <div class="countdown-container mb-4">
                                <div class="text-muted mb-2">Sisa waktu untuk merespons:</div>
                                <div class="fw-bold text-danger fs-2">02:45</div>
                            </div>

                            <button class="btn btn-success btn-lg rounded-pill px-4 py-2 pulse-btn">
                                <i class="fas fa-check-circle me-2"></i> Konfirmasi Kedatangan
                            </button>

                        @elseif($antrianAktif->status == 'menunggu')
                            <h2 class="fw-bold text-warning mb-3">MENUNGGU ANTRIAN</h2>
                            <div class="display-1 fw-bold text-gradient mb-3" style="color: #f6c23e;">
                                A-{{ str_pad($antrianAktif->nomor_antrian, 3, '0', STR_PAD_LEFT) }}
                            </div>
                            <p class="text-muted mb-4">Perkiraan waktu tunggu: 15-20 menit</p>

                            <div class="waiting-info bg-light rounded-3 p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Antrian Saat Ini</span>
                                    <span class="badge bg-primary fs-6">
                                        {{ $antrianSekarang ? 'A-' . str_pad($antrianSekarang->nomor_antrian, 3, '0', STR_PAD_LEFT) : '-' }}
                                    </span>
                                </div>
                                <div class="progress" style="height: 10px;">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"></div>
                                </div>
                            </div>
                        @endif
                    @else
                        <h2 class="fw-bold text-secondary mb-3">BELUM ADA ANTRIAN</h2>
                        <div class="display-1 fw-bold text-muted mb-3">-</div>
                        <p class="text-muted mb-4">Silakan ambil nomor antrian terlebih dahulu</p>
                        <button type="button" class="btn btn-primary btn-lg rounded-pill px-4 py-2">
                            <i class="fas fa-ticket-alt me-2"></i> Ambil Antrian
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Pasien dan Status Antrian -->
    <div class="row g-4">
        <!-- Informasi Pasien -->
<div class="col-md-6">
    <div class="card border-0 shadow-sm rounded-4 h-100">
        <div class="card-header bg-transparent border-0 py-3">
            <h5 class="fw-semibold mb-0 text-primary">
                <i class="fas fa-user-circle me-2"></i>Informasi Pasien
            </h5>
        </div>
        <div class="card-body">
            <!-- Nama Pasien -->
            <div class="d-flex align-items-center mb-3">
                <div class="bg-primary bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="fas fa-user text-primary"></i>
                </div>
                <div>
                    <div class="text-muted small">Nama Pasien</div>
                    <div class="fw-semibold">{{ $dataPasien['nama'] }}</div>
                </div>
            </div>
            
            <!-- Dokter Jaga - INI YANG PERLU DIPERBAIKI -->
            <div class="d-flex align-items-center mb-3">
                <div class="bg-info bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="fas fa-stethoscope text-info"></i>
                </div>
                <div>
                    <div class="text-muted small">Dokter Jaga</div>
                    <div class="fw-semibold">{{ $formattedDokter['nama'] }}</div>
                    <small class="text-muted">{{ $formattedDokter['spesialis'] }}</small>
                </div>
            </div>
            
            <!-- Tanggal Berobat -->
            <div class="d-flex align-items-center mb-3">
                <div class="bg-success bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="fas fa-calendar text-success"></i>
                </div>
                <div>
                    <div class="text-muted small">Tanggal Berobat</div>
                    <div class="fw-semibold">{{ $dataPasien['tanggal_berobat'] }}</div>
                </div>
            </div>
            
            <!-- Lokasi Poli -->
            <div class="d-flex align-items-center">
                <div class="bg-warning bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="fas fa-map-marker-alt text-warning"></i>
                </div>
                <div>
                    <div class="text-muted small">Lokasi Poli</div>
                    <div class="fw-semibold">{{ $dataPasien['lokasi_poli'] }}</div>
                </div>
            </div>

            <!-- TAMBAHKAN JADWAL PRAKTEK -->
            <div class="d-flex align-items-center mt-3 pt-3 border-top">
                <div class="bg-secondary bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="fas fa-clock text-secondary"></i>
                </div>
                <div>
                    <div class="text-muted small">Jadwal Praktek</div>
                    <div class="fw-semibold text-success">{{ $formattedDokter['jadwal'] }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
    .hover-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
    }
    .pulse-btn {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7); }
        70% { transform: scale(1.05); box-shadow: 0 0 0 10px rgba(40, 167, 69, 0); }
        100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(40, 167, 69, 0); }
    }
    .text-gradient {
        background: linear-gradient(135deg, #4e73df, #224abe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const confirmBtn = document.querySelector('.pulse-btn');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            alert('Kedatangan Anda telah dikonfirmasi. Silakan menunggu di ruang tunggu.');
            this.innerHTML = '<i class="fas fa-check-double me-2"></i> Terkonfirmasi';
            this.disabled = true;
            this.classList.remove('pulse-btn', 'btn-success');
            this.classList.add('btn-secondary');
        });
    }

    // Auto refresh tiap 30 detik
    setInterval(() => window.location.reload(), 30000);
});
</script>
@endsection
