@extends('layout.navbar-dokter')

@section('content')
<div class="container-fluid py-4">
    <!-- Header dengan Panggilan Aktif -->
    @php
        $currentPatient = $pasien->where('status_antrian', 'dipanggil')->first();
    @endphp

    @if($currentPatient)
    <!-- Banner Pasien yang Sedang Dipanggil -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-lg border-0 call-banner">
                <div class="card-body text-white text-center py-5">
                    <div class="pulse-animation mb-3">
                        <i class="fas fa-bell fa-4x"></i>
                    </div>
                    <h1 class="display-5 fw-bold mb-3">PASIEN DIPANGGIL</h1>
                    <div class="patient-info mb-4">
                        <h2 class="fw-bold mb-2">{{ $currentPatient->name }}</h2>
                        <p class="mb-1">No. RM: {{ $currentPatient->no_rm ?? 'RM-' . str_pad($currentPatient->id, 6, '0', STR_PAD_LEFT) }}</p>
                        <p class="mb-0">Ruangan: 301 - Poli Umum</p>
                    </div>
                    <form action="{{ route('dokter.selesai', $currentPatient->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-light btn-lg px-5 py-3 fw-bold">
                            <i class="fas fa-check-circle me-2"></i>PEMERIKSAAN SELESAI
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Notifikasi -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
            <i class="fas fa-check-circle me-2 fa-lg"></i>
            <div class="flex-grow-1">{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Panel Kontrol Utama -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <!-- Panel Antrian Real-time -->
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-clock me-2"></i>ANTRIAN REAL-TIME
                    </h5>
                </div>
                <div class="card-body">
                    <div class="queue-display">
                        @php
                            $waitingPatients = $pasien->where('status_antrian', 'menunggu');
                            $nextPatient = $waitingPatients->first();
                        @endphp

                        @if($nextPatient)
                        <div class="next-patient-card text-center p-4 mb-4">
                            <div class="next-badge">BERIKUTNYA</div>
                            <h3 class="text-success fw-bold mt-2">{{ $nextPatient->name }}</h3>
                            <p class="text-muted">No. Antrian: A-{{ str_pad($waitingPatients->count() > 0 ? $waitingPatients->keys()->first() + 1 : 1, 3, '0', STR_PAD_LEFT) }}</p>
                            
                            <form action="{{ route('dokter.panggil', $nextPatient->id) }}" method="POST" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-success btn-lg px-4 call-now-btn">
                                    <i class="fas fa-bullhorn me-2"></i>PANGGIL SEKARANG
                                </button>
                            </form>
                        </div>
                        @endif

                        <!-- Daftar Antrian Singkat -->
                        <div class="queue-list">
                            <h6 class="fw-bold mb-3 text-success">Daftar Menunggu ({{ $waitingPatients->count() }} orang):</h6>
                            <div class="row g-2">
                                @foreach($waitingPatients->take(4) as $index => $patient)
                                <div class="col-md-6">
                                    <div class="queue-item d-flex align-items-center p-3 border rounded">
                                        <div class="queue-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" 
                                             style="width: 40px; height: 40px;">
                                            <span class="fw-bold">{{ $index + 1 }}</span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 fw-bold text-dark">{{ $patient->name }}</h6>
                                            <small class="text-muted">{{ $patient->created_at->format('H:i') }}</small>
                                        </div>
                                        <form action="{{ route('dokter.panggil', $patient->id) }}" method="POST" class="ms-2">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-success btn-sm call-btn">
                                                <i class="fas fa-bell me-1"></i>Panggil
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            @if($waitingPatients->count() > 4)
                            <div class="text-center mt-3">
                                <small class="text-muted">+ {{ $waitingPatients->count() - 4 }} pasien lainnya menunggu</small>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Panel Statistik Cepat -->
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-chart-pie me-2"></i>STATISTIK HARI INI
                    </h5>
                </div>
                <div class="card-body">
                    <div class="stats-grid">
                        <div class="stat-item text-center p-3">
                            <div class="stat-value text-warning fw-bold display-6">
                                {{ $pasien->where('status_antrian', 'menunggu')->count() }}
                            </div>
                            <div class="stat-label text-muted">Menunggu</div>
                        </div>
                        <div class="stat-item text-center p-3">
                            <div class="stat-value text-info fw-bold display-6">
                                {{ $pasien->where('status_antrian', 'dipanggil')->count() }}
                            </div>
                            <div class="stat-label text-muted">Dipanggil</div>
                        </div>
                        <div class="stat-item text-center p-3">
                            <div class="stat-value text-success fw-bold display-6">
                                {{ $pasien->where('status_antrian', 'selesai')->count() }}
                            </div>
                            <div class="stat-label text-muted">Selesai</div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="progress-container mt-4">
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-success fw-bold">Progress Hari Ini</small>
                            <small class="text-success fw-bold">
                                @php
                                    $total = $pasien->count();
                                    $completed = $pasien->where('status_antrian', 'selesai')->count();
                                    $progress = $total > 0 ? ($completed / $total) * 100 : 0;
                                @endphp
                                {{ number_format($progress, 0) }}%
                            </small>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-success" role="progressbar" 
                                 style="width: {{ $progress }}%" 
                                 aria-valuenow="{{ $progress }}" 
                                 aria-valuemin="0" 
                                 aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Panel Riwayat Panggilan -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-history me-2"></i>RIWAYAT PANGGILAN TERAKHIR
                    </h5>
                </div>
                <div class="card-body">
                    <div class="timeline-wrapper">
                        <div class="call-timeline">
                            @php
                                $recentCalls = $pasien->where('status_antrian', 'selesai')->take(5);
                            @endphp
                            
                            @if($recentCalls->count() > 0)
                                @foreach($recentCalls as $call)
                                <div class="timeline-item">
                                    <div class="timeline-marker bg-success"></div>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="mb-1 fw-bold text-dark">{{ $call->name }}</h6>
                                                <p class="mb-1 text-muted">No. RM: {{ $call->no_rm ?? 'RM-' . str_pad($call->id, 6, '0', STR_PAD_LEFT) }}</p>
                                                <small class="text-success">
                                                    <i class="fas fa-check-circle me-1"></i>
                                                    Selesai: {{ $call->updated_at->format('H:i') }}
                                                </small>
                                            </div>
                                            <form action="{{ route('dokter.hapus', $call->id) }}" method="POST" 
                                                  onsubmit="return confirm('Hapus dari riwayat?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="text-center py-4">
                                    <i class="fas fa-history fa-3x text-muted mb-3"></i>
                                    <p class="text-muted">Belum ada riwayat panggilan hari ini</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Panggilan -->
<div class="modal fade" id="callModal" tabindex="-1" aria-labelledby="callModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="callModalLabel">
                    <i class="fas fa-bullhorn me-2"></i>Konfirmasi Panggilan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="mb-4">
                    <i class="fas fa-bell fa-3x text-success mb-3"></i>
                    <h4 class="fw-bold text-success" id="patientNameCall">{{ $nextPatient->name ?? 'Pasien' }}</h4>
                    <p class="text-muted">Akan dipanggil sekarang dengan suara</p>
                </div>
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-success btn-lg" id="confirmCallBtn">
                        <i class="fas fa-play me-2"></i>Putar Suara Panggilan
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-2"></i>Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .call-banner {
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
        animation: pulse 2s infinite;
    }

    .pulse-animation {
        animation: ring 2s infinite;
    }

    @keyframes ring {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(46, 125, 50, 0.7); }
        70% { box-shadow: 0 0 0 20px rgba(46, 125, 50, 0); }
        100% { box-shadow: 0 0 0 0 rgba(46, 125, 50, 0); }
    }

    .next-patient-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 2px dashed #2e7d32;
        border-radius: 15px;
        position: relative;
    }

    .next-badge {
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        background: #2e7d32;
        color: white;
        padding: 5px 20px;
        border-radius: 20px;
        font-weight: bold;
        font-size: 0.8rem;
    }

    .queue-item {
        transition: all 0.3s ease;
        background: white;
        border: 1px solid #e9ecef !important;
    }

    .queue-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(46, 125, 50, 0.15);
        border-color: #2e7d32 !important;
    }

    .queue-number {
        min-width: 40px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 10px;
    }

    .stat-item {
        background: #f8f9fa;
        border-radius: 10px;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }

    .stat-item:hover {
        background: #e8f5e8;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(46, 125, 50, 0.1);
    }

    .call-timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline-item {
        position: relative;
        margin-bottom: 20px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 10px;
        border-left: 4px solid #2e7d32;
        transition: all 0.3s ease;
    }

    .timeline-item:hover {
        background: #e8f5e8;
        transform: translateX(5px);
    }

    .timeline-marker {
        position: absolute;
        left: -38px;
        top: 20px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 3px #2e7d32;
    }

    .card {
        border: none;
        border-radius: 15px;
        border: 1px solid #e9ecef;
    }

    .card-header {
        border-radius: 15px 15px 0 0 !important;
        border: none;
    }

    .progress {
        border-radius: 10px;
        background-color: #e9ecef;
    }

    .progress-bar {
        border-radius: 10px;
        background: linear-gradient(135deg, #4caf50 0%, #2e7d32 100%);
    }

    .display-6 {
        font-size: 2.5rem;
    }

    .btn-success {
        background: linear-gradient(135deg, #4caf50 0%, #2e7d32 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(46, 125, 50, 0.3);
        background: linear-gradient(135deg, #2e7d32 0%, #1b5e20 100%);
    }

    .btn-outline-success {
        border-color: #2e7d32;
        color: #2e7d32;
        transition: all 0.3s ease;
    }

    .btn-outline-success:hover {
        background-color: #2e7d32;
        border-color: #2e7d32;
        transform: translateY(-1px);
    }

    .call-now-btn {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .call-now-btn:hover {
        background: linear-gradient(135deg, #e55a2b 0%, #e0821b 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(255, 107, 53, 0.4);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const callModal = new bootstrap.Modal(document.getElementById('callModal'));
        const confirmCallBtn = document.getElementById('confirmCallBtn');
        
        let currentForm = null;

        // Handle tombol panggil
        document.querySelectorAll('.call-now-btn, .call-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                currentForm = this.closest('form');
                callModal.show();
            });
        });

        // Konfirmasi panggilan dengan suara
        confirmCallBtn.addEventListener('click', function() {
            playCallSound();
            
            // Submit form setelah 3 detik (memberi waktu suara diputar)
            setTimeout(() => {
                if (currentForm) {
                    currentForm.submit();
                }
            }, 3000);
            
            callModal.hide();
        });

        // Sound effect untuk panggilan
        function playCallSound() {
            const AudioContext = window.AudioContext || window.webkitAudioContext;
            const audioCtx = new AudioContext();
            
            // Create oscillator untuk bell sound yang lebih natural
            const oscillator = audioCtx.createOscillator();
            const gainNode = audioCtx.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioCtx.destination);
            
            // Bell sound pattern: ding-dong-ding
            oscillator.type = 'sine';
            const now = audioCtx.currentTime;

            // First bell
            oscillator.frequency.setValueAtTime(800, now);
            gainNode.gain.setValueAtTime(0, now);
            gainNode.gain.linearRampToValueAtTime(0.3, now + 0.1);
            gainNode.gain.exponentialRampToValueAtTime(0.001, now + 0.5);

            // Second bell (slightly lower)
            oscillator.frequency.setValueAtTime(600, now + 0.7);
            gainNode.gain.setValueAtTime(0, now + 0.7);
            gainNode.gain.linearRampToValueAtTime(0.3, now + 0.8);
            gainNode.gain.exponentialRampToValueAtTime(0.001, now + 1.2);

            // Third bell (original pitch)
            oscillator.frequency.setValueAtTime(800, now + 1.4);
            gainNode.gain.setValueAtTime(0, now + 1.4);
            gainNode.gain.linearRampToValueAtTime(0.3, now + 1.5);
            gainNode.gain.exponentialRampToValueAtTime(0.001, now + 1.9);

            oscillator.start(now);
            oscillator.stop(now + 2.0);
        }

        // Auto refresh setiap 15 detik jika ada pasien menunggu
        setInterval(() => {
            const waitingCount = {{ $pasien->where('status_antrian', 'menunggu')->count() }};
            if (waitingCount > 0) {
                location.reload();
            }
        }, 15000);

        // Play sound otomatis jika ada pasien yang sedang dipanggil
        @if($currentPatient)
        setTimeout(playCallSound, 1000);
        @endif
    });
</script>
@endsection