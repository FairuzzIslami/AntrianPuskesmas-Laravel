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
                        'dipanggil' => ['color' => 'primary', 'icon' => 'bi-bell-fill', 'badge_icon' => 'bi-megaphone'],
                        'dalam pemeriksaan' => ['color' => 'warning', 'icon' => 'bi-clipboard-pulse', 'badge_icon' => 'bi-stethoscope'],
                        'selesai' => ['color' => 'success', 'icon' => 'bi-check-circle-fill', 'badge_icon' => 'bi-award'],
                        'menunggu' => ['color' => 'secondary', 'icon' => 'bi-clock', 'badge_icon' => 'bi-person-waiting']
                    ];
                    $config = $statusConfig[$status] ?? $statusConfig['menunggu'];
                    $statusText = strtoupper($status);
                @endphp

                <div class="status-badge-wrapper mb-3">
                    <div class="status-badge bg-{{ $config['color'] }} rounded-3 p-4 position-relative">
                        <div class="status-badge-icon-wrapper">
                            <i class="{{ $config['badge_icon'] }} status-badge-icon"></i>
                        </div>
                        <h4 class="fw-bold text-white mb-0 mt-2">{{ $statusText }}</h4>
                    </div>
                </div>
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
                                <strong class="text-dark">{{ now()->format('H:i') }} WIB</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PESAN STATUS -->
            <div class="message-section text-center mb-4">
                @if($status === 'menunggu')
                    <div class="alert alert-warning alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-clock me-2"></i>
                        <strong>Silakan menunggu</strong> - Panggilan dari dokter akan segera datang
                    </div>
                @elseif($status === 'dipanggil')
                    <div class="alert alert-primary alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-bell-fill me-2"></i>
                        <strong>Anda sedang dipanggil!</strong> - Segera menuju ruang pemeriksaan
                    </div>
                @elseif($status === 'dalam pemeriksaan')
                    <div class="alert alert-warning alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-clipboard-pulse me-2"></i>
                        <strong>Pemeriksaan berlangsung</strong> - Dokter sedang memeriksa Anda
                    </div>
                @elseif($status === 'selesai')
                    <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <strong>Pemeriksaan selesai</strong> - Terima kasih telah berkunjung
                    </div>
                @endif
            </div>

            <!-- AUTO REFRESH -->
            <div class="refresh-section text-center">
                <div class="d-flex align-items-center justify-content-center text-muted">
                    <div class="spinner-grow spinner-grow-sm text-primary me-2" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <small>Halaman akan otomatis memperbarui dalam <span id="countdown">10</span> detik</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AUTO REFRESH SCRIPT -->
<script>
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

    /* Animasi untuk status badge */
    .status-badge {
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.1);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
        }
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
    }
</style>
@endsection