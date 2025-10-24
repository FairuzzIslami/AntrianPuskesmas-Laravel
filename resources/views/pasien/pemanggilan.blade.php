@extends('layout.pasien')

@section('title', 'Status Pemanggilan')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

@section('content')
<div class="container py-5 animate__animated animate__fadeIn">

    <!-- HEADER -->
    <div class="text-center mb-5">
        <div class="status-header mb-4">
            <div class="status-icon-wrapper mb-3">
                <i class="bi bi-megaphone-fill status-icon"></i>
            </div>
            <h2 class="fw-bold text-gradient-primary">Status Pemanggilan</h2>
            <p class="text-muted fs-5">Pantau status antrian Anda secara real-time</p>
        </div>
    </div>

    <!-- KARTU STATUS -->
    <div class="card status-card shadow-lg border-0 rounded-4 mx-auto" style="max-width: 650px;">
        <div class="card-body p-5">
            
            <!-- USER INFO -->
            <div class="user-info-section text-center mb-4">
                <div class="avatar-wrapper mb-3">
                    <i class="bi bi-person-circle user-avatar"></i>
                </div>
                <h4 class="fw-semibold text-dark mb-1">{{ auth()->user()->name }}</h4>
                <p class="text-muted mb-0">
                    <i class="bi bi-envelope me-2"></i>{{ auth()->user()->email }}
                </p>
            </div>

            <!-- STATUS ANTRIAN -->
            <div class="status-section text-center my-5">
                @php
                    $status = auth()->user()->status_antrian ?? 'menunggu';
                    $statusConfig = [
                        'dipanggil' => [
                            'color' => 'primary', 
                            'icon' => 'bi-bell-fill', 
                            'badge_icon' => 'bi-megaphone-fill',
                            'title' => 'DIPANGGIL',
                            'animation' => 'animate__tada'
                        ],
                        'dalam pemeriksaan' => [
                            'color' => 'warning', 
                            'icon' => 'bi-clipboard-pulse', 
                            'badge_icon' => 'bi-stethoscope',
                            'title' => 'DALAM PEMERIKSAAN',
                            'animation' => 'animate__pulse'
                        ],
                        'selesai' => [
                            'color' => 'success', 
                            'icon' => 'bi-check-circle-fill', 
                            'badge_icon' => 'bi-award-fill',
                            'title' => 'SELESAI',
                            'animation' => 'animate__heartBeat'
                        ],
                        'menunggu' => [
                            'color' => 'secondary', 
                            'icon' => 'bi-clock', 
                            'badge_icon' => 'bi-person-arms-up',
                            'title' => 'MENUNGGU',
                            'animation' => 'animate__fadeIn'
                        ],
                        'batal' => [
                            'color' => 'danger', 
                            'icon' => 'bi-x-circle-fill', 
                            'badge_icon' => 'bi-slash-circle-fill',
                            'title' => 'DIBATALKAN',
                            'animation' => 'animate__shakeX'
                        ],
                        'terlewat' => [
                            'color' => 'dark', 
                            'icon' => 'bi-exclamation-triangle-fill', 
                            'badge_icon' => 'bi-clock-history',
                            'title' => 'TERLEWAT',
                            'animation' => 'animate__wobble'
                        ]
                    ];
                    $config = $statusConfig[$status] ?? $statusConfig['menunggu'];
                    $statusText = $config['title'];
                @endphp

                <div class="status-badge-wrapper mb-3">
                    <div class="status-badge bg-{{ $config['color'] }} rounded-3 p-4 position-relative animate__animated {{ $config['animation'] }}">
                        <div class="status-badge-icon-wrapper">
                            <i class="{{ $config['badge_icon'] }} status-badge-icon"></i>
                        </div>
                        <h4 class="fw-bold text-white mb-0 mt-2">{{ $statusText }}</h4>
                    </div>
                </div>

                <!-- ELEMEN KHUSUS UNTUK STATUS DALAM PEMERIKSAAN -->
                @if($status === 'dalam pemeriksaan')
                <div class="examination-progress mt-4">
                    <div class="progress-indicator mb-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">Proses Pemeriksaan</small>
                            <small class="text-warning fw-semibold">Sedang Berlangsung</small>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" 
                                 role="progressbar" style="width: 65%" 
                                 aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                    <div class="examination-icons row g-3 mt-3">
                        <div class="col-4 text-center">
                            <div class="exam-step active">
                                <i class="bi bi-clipboard2-pulse-fill exam-icon text-warning"></i>
                                <small class="d-block mt-1 text-muted">Anamnesis</small>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="exam-step active">
                                <i class="bi bi-heart-pulse-fill exam-icon text-warning"></i>
                                <small class="d-block mt-1 text-muted">Pemeriksaan</small>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <div class="exam-step">
                                <i class="bi bi-prescription2 exam-icon text-muted"></i>
                                <small class="d-block mt-1 text-muted">Diagnosis</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- INFORMASI DETAIL -->
            <div class="info-section bg-light rounded-3 p-4 mb-4">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon-wrapper bg-primary rounded-2 me-3">
                                <i class="bi bi-calendar2-week text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Tanggal</small>
                                <strong class="text-dark">{{ now()->format('d F Y') }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon-wrapper bg-success rounded-2 me-3">
                                <i class="bi bi-clock text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Waktu</small>
                                <strong class="text-dark" id="realTimeClock">{{ now()->format('H:i:s') }} WIB</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon-wrapper bg-warning rounded-2 me-3">
                                <i class="bi bi-123 text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Nomor Antrian</small>
                                <strong class="text-dark">A{{ sprintf('%03d', auth()->user()->nomor_antrian ?? '001') }}</strong>
                            </div>
                        </div>
                    </div>

                    <!-- INFORMASI TAMBAHAN UNTUK STATUS DALAM PEMERIKSAAN -->
                    @if($status === 'dalam pemeriksaan')
                    <div class="col-12 mt-3">
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon-wrapper bg-danger rounded-2 me-3">
                                <i class="bi bi-person-vcard text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Dokter Penanggung Jawab</small>
                                <strong class="text-dark">Dr. {{ auth()->user()->dokter ?? 'Wahyu Pratama' }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="info-item d-flex align-items-center">
                            <div class="info-icon-wrapper bg-purple rounded-2 me-3">
                                <i class="bi bi-door-open text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Ruang Pemeriksaan</small>
                                <strong class="text-dark">{{ auth()->user()->ruang_pemeriksaan ?? 'Ruang 1' }}</strong>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- PESAN STATUS -->
            <div class="message-section text-center mb-4">
                @if($status === 'menunggu')
                    <div class="alert alert-warning alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-clock me-2"></i>
                        <strong>Silakan menunggu dengan sabar</strong> - Panggilan dari dokter akan segera datang. Pastikan Anda berada di area tunggu.
                    </div>
                @elseif($status === 'dipanggil')
                    <div class="alert alert-primary alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-bell-fill me-2"></i>
                        <strong>Anda sedang dipanggil!</strong> - Segera menuju ruang pemeriksaan {{ auth()->user()->ruang_pemeriksaan ?? 'Ruang 1' }}
                    </div>
                @elseif($status === 'dalam pemeriksaan')
                    <div class="alert alert-warning alert-dismissible fade show rounded-3 d-flex align-items-center" role="alert">
                        <div class="flex-shrink-0">
                            <i class="bi bi-clipboard-pulse me-2 fs-5"></i>
                        </div>
                        <div class="flex-grow-1">
                            <strong>Pemeriksaan sedang berlangsung</strong> - Dokter {{ auth()->user()->dokter ?? 'Wahyu Pratama' }} sedang memeriksa kondisi Anda. Mohon tetap tenang dan kooperatif.
                        </div>
                    </div>
                    
                    <!-- TIMER PEMERIKSAAN -->
                    <div class="examination-timer mt-3">
                        <div class="card border-warning bg-light-warning">
                            <div class="card-body py-3">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <i class="bi bi-stopwatch fs-4 text-warning"></i>
                                    </div>
                                    <div class="col">
                                        <small class="text-muted d-block">Durasi Pemeriksaan</small>
                                        <strong class="text-dark" id="examinationTimer">00:00</strong>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-activity me-1"></i>Aktif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($status === 'selesai')
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <strong>Pemeriksaan telah selesai</strong> - Terima kasih telah berkunjung. Jaga selalu kesehatan Anda!
                    </div>
                @elseif($status === 'batal')
                    <div class="alert alert-danger alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-x-circle-fill me-2"></i>
                        <strong>Pemeriksaan dibatalkan</strong> - Silakan hubungi administrasi untuk informasi lebih lanjut
                    </div>
                @elseif($status === 'terlewat')
                    <div class="alert alert-dark alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Panggilan terlewat</strong> - Silakan tunggu panggilan ulang atau hubungi petugas
                    </div>
                @endif
            </div>

            <!-- INSTRUKSI KHUSUS -->
            <div class="instruction-section mt-4">
                <div class="card border-0 bg-light">
                    <div class="card-body text-center">
                        <h6 class="fw-semibold mb-3">
                            <i class="bi bi-info-circle me-2 text-primary"></i>
                            Instruksi Penting
                        </h6>
                        <div class="instruction-content">
                            @if($status === 'menunggu')
                                <p class="small text-muted mb-2">
                                    <i class="bi bi-check-circle me-2 text-success"></i>
                                    Pastikan kartu berobat Anda sudah siap
                                </p>
                                <p class="small text-muted mb-0">
                                    <i class="bi bi-check-circle me-2 text-success"></i>
                                    Tunggu panggilan dengan tenang di area tunggu
                                </p>
                            @elseif($status === 'dipanggil')
                                <p class="small text-muted mb-2">
                                    <i class="bi bi-exclamation-triangle me-2 text-warning"></i>
                                    Bawa semua berkas yang diperlukan
                                </p>
                                <p class="small text-muted mb-0">
                                    <i class="bi bi-exclamation-triangle me-2 text-warning"></i>
                                    Segera menuju ruang pemeriksaan
                                </p>
                            @elseif($status === 'dalam pemeriksaan')
                                <div class="row g-2">
                                    <div class="col-12">
                                        <p class="small text-muted mb-2">
                                            <i class="bi bi-heart-pulse me-2 text-warning"></i>
                                            Berikan informasi yang jelas tentang keluhan Anda
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <p class="small text-muted mb-2">
                                            <i class="bi bi-file-earmark-medical me-2 text-warning"></i>
                                            Sampaikan riwayat penyakit dan alergi jika ada
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <p class="small text-muted mb-0">
                                            <i class="bi bi-shield-check me-2 text-warning"></i>
                                            Ikuti instruksi dokter dengan baik selama pemeriksaan
                                        </p>
                                    </div>
                                </div>
                            @elseif($status === 'selesai')
                                <p class="small text-muted mb-2">
                                    <i class="bi bi-capsule me-2 text-info"></i>
                                    Ikuti instruksi dan konsumsi obat sesuai resep
                                </p>
                                <p class="small text-muted mb-0">
                                    <i class="bi bi-calendar-check me-2 text-info"></i>
                                    Jadwalkan kunjungan berikutnya jika diperlukan
                                </p>
                            @else
                                <p class="small text-muted mb-0">
                                    <i class="bi bi-telephone me-2 text-primary"></i>
                                    Hubungi petugas jika membutuhkan bantuan
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- AUTO REFRESH -->
            <div class="refresh-section text-center mt-4">
                <div class="d-flex align-items-center justify-content-center text-muted">
                    <div class="spinner-grow spinner-grow-sm text-primary me-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <small>Halaman akan otomatis memperbarui dalam <span id="countdown">10</span> detik</small>
                </div>
                <button class="btn btn-outline-primary btn-sm mt-2" onclick="window.location.reload()">
                    <i class="bi bi-arrow-clockwise me-1"></i>Refresh Sekarang
                </button>
            </div>
        </div>
    </div>
</div>

<!-- AUTO REFRESH & REAL-TIME CLOCK SCRIPT -->
<script>
    // Real-time clock update
    function updateRealTimeClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        
        document.getElementById('realTimeClock').textContent = 
            `${hours}:${minutes}:${seconds} WIB`;
    }

    // Update clock every second
    setInterval(updateRealTimeClock, 1000);

    // Initialize immediately
    updateRealTimeClock();

    // Auto refresh countdown
    let countdown = 10;
    const countdownElement = document.getElementById('countdown');
    
    const countdownInterval = setInterval(() => {
        countdown--;
        countdownElement.textContent = countdown;
        
        if (countdown <= 0) {
            clearInterval(countdownInterval);
            window.location.reload();
        }
    }, 1000);

    setTimeout(() => {
        window.location.reload();
    }, 10000);

    // Timer untuk pemeriksaan
    @if($status === 'dalam pemeriksaan')
    let examinationSeconds = 0;
    const examinationTimer = document.getElementById('examinationTimer');
    
    const examinationInterval = setInterval(() => {
        examinationSeconds++;
        const minutes = Math.floor(examinationSeconds / 60);
        const seconds = examinationSeconds % 60;
        examinationTimer.textContent = 
            `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }, 1000);
    @endif
</script>

<style>
    .status-header {
        position: relative;
    }
    
    .status-icon-wrapper {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #28a745, #20c997);
        border-radius: 50%;
        margin: 0 auto;
    }
    
    .status-icon {
        font-size: 2rem;
        color: white;
    }
    
    .text-gradient-primary {
        background: linear-gradient(135deg, #28a745, #20c997);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .status-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        border: 1px solid #e9ecef;
    }
    
    .user-avatar {
        font-size: 3rem;
        color: #6c757d;
    }
    
    .avatar-wrapper {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background-color: #f8f9fa;
        border-radius: 50%;
        border: 3px solid #e9ecef;
    }
    
    .status-badge {
        display: inline-block;
        position: relative;
        min-width: 220px;
        padding: 2rem 1.5rem !important;
    }
    
    .status-badge-icon-wrapper {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        margin-bottom: 0.5rem;
        border: 3px solid rgba(255, 255, 255, 0.3);
    }
    
    .status-badge-icon {
        font-size: 2.5rem;
        color: white;
    }
    
    .info-icon-wrapper {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .info-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .alert {
        border: none;
        font-weight: 500;
    }
    
    .spinner-grow {
        animation-duration: 1.5s;
    }

    /* Styling khusus untuk status dalam pemeriksaan */
    .examination-progress {
        background: rgba(255, 193, 7, 0.1);
        border-radius: 15px;
        padding: 1.5rem;
        border: 2px dashed rgba(255, 193, 7, 0.3);
    }
    
    .exam-icon {
        font-size: 1.8rem;
        display: block;
        margin: 0 auto;
    }
    
    .exam-step.active .exam-icon {
        animation: pulse 2s infinite;
    }
    
    .examination-timer .card {
        background: linear-gradient(135deg, #fff3cd, #ffeaa7);
        border: 2px solid #ffc107;
    }
    
    .bg-purple {
        background-color: #6f42c1 !important;
    }
    
    .bg-light-warning {
        background: linear-gradient(135deg, #fff3cd, #ffeaa7);
    }

    /* Animasi khusus untuk setiap status */
    .status-badge {
        animation: pulse 2s infinite;
    }
    
    /* Animasi untuk status dipanggil */
    .bg-primary.status-badge {
        animation: pulse 1s infinite, glow 2s infinite;
    }
    
    /* Animasi untuk status dalam pemeriksaan */
    .bg-warning.status-badge {
        animation: pulse 3s infinite;
    }
    
    /* Animasi untuk status selesai */
    .bg-success.status-badge {
        animation: gentlePulse 4s infinite;
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.4);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(0, 123, 255, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
        }
    }
    
    @keyframes glow {
        0%, 100% {
            box-shadow: 0 0 20px rgba(0, 123, 255, 0.5);
        }
        50% {
            box-shadow: 0 0 30px rgba(0, 123, 255, 0.8);
        }
    }
    
    @keyframes gentlePulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.02);
        }
    }
    
    .instruction-section .card {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    }
    
    @media (max-width: 576px) {
        .card-body {
            padding: 2rem !important;
        }
        
        .status-badge {
            min-width: 200px;
            padding: 1.5rem !important;
        }
        
        .status-badge-icon-wrapper {
            width: 60px;
            height: 60px;
        }
        
        .status-badge-icon {
            font-size: 2rem;
        }
        
        .info-section {
            padding: 1.5rem !important;
        }
        
        .examination-progress {
            padding: 1rem;
        }
        
        .exam-icon {
            font-size: 1.5rem;
        }
    }
</style>
@endsection