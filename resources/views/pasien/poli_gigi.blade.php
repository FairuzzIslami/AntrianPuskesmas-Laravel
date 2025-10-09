@extends('layout.pasien')

@section('title', 'Status Antrian - Poli Gigi')

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
                            <p class="text-light mb-0">Status antrian Anda di Poli Gigi akan diperbarui secara real-time</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-white bg-opacity-20 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="fas fa-tooth text-white fs-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifikasi Status -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Kartu Status Utama -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">
            <div class="card border-0 shadow-lg rounded-4 mb-4">
                <div class="card-body p-5 text-center">
                    <div class="bg-primary bg-opacity-10 rounded-circle mx-auto d-flex align-items-center justify-content-center mb-4" style="width: 100px; height: 100px;">
                        <i class="fas fa-tooth text-primary fs-1"></i>
                    </div>
                    
                    <!-- Status berdasarkan data dari controller -->
                    @if($antrianAktif)
                        @if($antrianAktif->status == 'dipanggil')
                            <h2 class="fw-bold text-primary mb-3">ANTRIAN ANDA SEDANG DIPANGGIL</h2>
                            <div class="display-1 fw-bold text-gradient mb-3" style="color: #4e73df;">G-{{ str_pad($antrianAktif->nomor_antrian, 3, '0', STR_PAD_LEFT) }}</div>
                            <p class="text-muted mb-4">Silakan menuju ke ruangan Poli Gigi</p>
                            
                            <button id="confirmBtn" class="btn btn-success btn-lg rounded-pill px-4 py-2 pulse-btn">
                                <i class="fas fa-check-circle me-2"></i> Konfirmasi Kedatangan
                            </button>
                        
                        @elseif($antrianAktif->status == 'menunggu')
                            <h2 class="fw-bold text-warning mb-3">MENUNGGU ANTRIAN</h2>
                            <div class="display-1 fw-bold text-gradient mb-3" style="color: #f6c23e;">G-{{ str_pad($antrianAktif->nomor_antrian, 3, '0', STR_PAD_LEFT) }}</div>
                            <p class="text-muted mb-4">Perkiraan waktu tunggu: 15-20 menit</p>
                            
                            <div class="waiting-info bg-light rounded-3 p-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Antrian Saat Ini</span>
                                    <span class="badge bg-primary fs-6">
                                        @if($antrianSekarang)
                                            G-{{ str_pad($antrianSekarang->nomor_antrian, 3, '0', STR_PAD_LEFT) }}
                                        @else
                                            -
                                        @endif
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
                        
                        <form action="{{ route('antrian.ambil') }}" method="POST">
                            @csrf
                            <input type="hidden" name="poli_id" value="poli_gigi">
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill px-4 py-2">
                                <i class="fas fa-ticket-alt me-2"></i> Ambil Antrian
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi dan Antrian -->
    <div class="row g-4">
        <!-- Informasi Poli Gigi -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="fw-semibold mb-0 text-primary">
                        <i class="fas fa-tooth me-2"></i>Informasi Poli Gigi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-user-md text-primary"></i>
                        </div>
                        <div>
                            <div class="text-muted small">Dokter Jaga</div>
                            <div class="fw-semibold">{{ $formattedDokter['nama'] }}</div>
                            <small class="text-muted">{{ $formattedDokter['spesialis'] }}</small>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-clock text-success"></i>
                        </div>
                        <div>
                            <div class="text-muted small">Jam Operasional</div>
                            <div class="fw-semibold">{{ $formattedDokter['jadwal'] }}</div>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-info bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-map-marker-alt text-info"></i>
                        </div>
                        <div>
                            <div class="text-muted small">Lokasi Poli</div>
                            <div class="fw-semibold">{{ $dataPasien['lokasi_poli'] }}</div>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-warning bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-calendar text-warning"></i>
                        </div>
                        <div>
                            <div class="text-muted small">Tanggal Berobat</div>
                            <div class="fw-semibold">{{ $dataPasien['tanggal_berobat'] }}</div>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center">
                        <div class="bg-secondary bg-opacity-10 rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-phone text-secondary"></i>
                        </div>
                        <div>
                            <div class="text-muted small">Kontak</div>
                            <div class="fw-semibold">(021) 1234-5678</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Antrian Sekarang -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="fw-semibold mb-0 text-primary">
                        <i class="fas fa-list-ol me-2"></i>Antrian Hari Ini
                    </h5>
                </div>
                <div class="card-body">
                    <div class="queue-info">
                        @if($antrianSekarang)
                        <div class="d-flex justify-content-between align-items-center p-3 bg-warning bg-opacity-10 rounded-3 mb-3">
                            <div>
                                <div class="text-muted small">Sedang Dipanggil</div>
                                <div class="fw-bold fs-5">G-{{ str_pad($antrianSekarang->nomor_antrian, 3, '0', STR_PAD_LEFT) }}</div>
                                <small class="text-muted">{{ $antrianSekarang->nama_pasien ?? 'Pasien' }}</small>
                            </div>
                            <div>
                                <span class="badge bg-warning rounded-pill pulse-slow">DIPANGGIL</span>
                            </div>
                        </div>
                        @endif

                        @foreach($daftarAntrian->where('status', 'menunggu')->take(5) as $antrian)
                        <div class="d-flex justify-content-between align-items-center p-3 border rounded-3 mb-3 hover-card">
                            <div>
                                <div class="text-muted small">Antrian {{ $antrian->nama_pasien ?? 'Pasien' }}</div>
                                <div class="fw-bold">G-{{ str_pad($antrian->nomor_antrian, 3, '0', STR_PAD_LEFT) }}</div>
                            </div>
                            <div>
                                <span class="badge bg-primary rounded-pill">MENUNGGU</span>
                            </div>
                        </div>
                        @endforeach

                        @if($daftarAntrian->where('status', 'menunggu')->count() == 0)
                        <div class="text-center py-4">
                            <div class="bg-light rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-clipboard-list text-muted"></i>
                            </div>
                            <p class="text-muted mb-0">Tidak ada antrian menunggu</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mt-4">
        <div class="col-12">
            <h5 class="fw-semibold text-dark mb-3">Aksi Cepat</h5>
            <div class="row g-3">
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 hover-card">
                        <div class="card-body text-center p-3">
                            <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fas fa-ticket-alt text-primary fs-4"></i>
                            </div>
                            <h6 class="fw-semibold mb-1">Ambil Antrian</h6>
                            <p class="text-muted small mb-0">Buat antrian baru</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 hover-card">
                        <div class="card-body text-center p-3">
                            <div class="bg-success bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fas fa-file-medical text-success fs-4"></i>
                            </div>
                            <h6 class="fw-semibold mb-1">Rekam Medis</h6>
                            <p class="text-muted small mb-0">Lihat riwayat</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 hover-card">
                        <div class="card-body text-center p-3">
                            <div class="bg-info bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fas fa-history text-info fs-4"></i>
                            </div>
                            <h6 class="fw-semibold mb-1">Riwayat Antrian</h6>
                            <p class="text-muted small mb-0">Antrian sebelumnya</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 hover-card">
                        <div class="card-body text-center p-3">
                            <div class="bg-warning bg-opacity-10 rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                <i class="fas fa-question-circle text-warning fs-4"></i>
                            </div>
                            <h6 class="fw-semibold mb-1">Bantuan</h6>
                            <p class="text-muted small mb-0">Pusat bantuan</p>
                        </div>
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
    .pulse-slow {
        animation: pulse 3s infinite;
    }
    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
        }
        70% {
            transform: scale(1.05);
            box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
        }
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
        }
    }
    .text-gradient {
        background: linear-gradient(135deg, #4e73df, #224abe);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Script tombol konfirmasi -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const confirmBtn = document.getElementById('confirmBtn');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            alert('Kedatangan Anda telah dikonfirmasi. Silakan menunggu di ruang tunggu Poli Gigi.');
            this.innerHTML = '<i class="fas fa-check-double me-2"></i> Terkonfirmasi';
            this.disabled = true;
            this.classList.remove('pulse-btn', 'btn-success');
            this.classList.add('btn-secondary');
        });
    }

    // Auto refresh setiap 30 detik untuk update real-time
    setInterval(function() {
        window.location.reload();
    }, 30000);
});
</script>
@endsection