@extends('layout.navbar-dokter')

@section('content')
<div class="container-fluid py-4 animate__animated animate__fadeIn">
    @php
        $currentPatient = $pasien->where('status_antrian', 'dipanggil')->first();
        $examiningPatient = $pasien->where('status_antrian', 'dalam pemeriksaan')->first();
    @endphp

    {{-- Banner Pemeriksaan atau Panggilan --}}
    @if($examiningPatient)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-lg border-0 overflow-hidden bg-gradient-to-r from-green-500 to-green-700 text-white">
                <div class="card-body text-center py-5 position-relative">
                    <div class="pulse-ring mb-3"><i class="fas fa-stethoscope fa-4x"></i></div>
                    <h1 class="fw-bold display-6 mb-2">PEMERIKSAAN SEDANG BERLANGSUNG</h1>
                    <h3 class="fw-semibold mb-1">{{ $examiningPatient->name }}</h3>
                    <p class="mb-4">No. RM: {{ $examiningPatient->no_rm ?? 'RM-' . str_pad($examiningPatient->id, 6, '0', STR_PAD_LEFT) }}</p>

                    <form action="{{ route('dokter.selesai', $examiningPatient->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light btn-lg px-5 py-3 fw-bold rounded-pill shadow-sm hover-scale">
                            <i class="fas fa-check-circle me-2"></i> SELESAIKAN PEMERIKSAAN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @elseif($currentPatient)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-lg border-0 overflow-hidden bg-gradient-to-r from-yellow-400 to-yellow-600 text-dark">
                <div class="card-body text-center py-5 position-relative">
                    <div class="ringing-bell mb-3"><i class="fas fa-bell fa-4x"></i></div>
                    <h1 class="fw-bold display-6 mb-2">PASIEN SEDANG DIPANGGIL</h1>
                    <h3 class="fw-semibold mb-1">{{ $currentPatient->name }}</h3>
                    <p class="mb-4">No. RM: {{ $currentPatient->no_rm ?? 'RM-' . str_pad($currentPatient->id, 6, '0', STR_PAD_LEFT) }}</p>

                    <form action="{{ route('dokter.mulai', $currentPatient->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark btn-lg px-5 py-3 fw-bold rounded-pill shadow-sm hover-scale">
                            <i class="fas fa-play-circle me-2"></i> MULAI PEMERIKSAAN
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Notifikasi --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
        <i class="fas fa-check-circle me-2 fa-lg"></i>
        <div class="flex-grow-1">{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    {{-- Panel Utama --}}
    <div class="row mb-4">
        {{-- Panel Antrian --}}
        <div class="col-lg-8">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0"><i class="fas fa-clock me-2"></i> ANTRIAN REAL-TIME</h5>
                </div>
                <div class="card-body">
                    @php
                        $waitingPatients = $pasien->where('status_antrian', 'menunggu');
                        $nextPatient = $waitingPatients->first();
                    @endphp

                    @if($nextPatient)
                    <div class="next-patient-card text-center p-4 mb-4 border rounded-4 bg-light">
                        <div class="next-badge">BERIKUTNYA</div>
                        <h3 class="text-success fw-bold mt-2">{{ $nextPatient->name }}</h3>
                        <p class="text-muted">No. Antrian: A-{{ str_pad($waitingPatients->keys()->first() + 1, 3, '0', STR_PAD_LEFT) }}</p>

                        <form action="{{ route('dokter.panggil', $nextPatient->id) }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg px-4 py-2 rounded-pill shadow-sm hover-scale">
                                <i class="fas fa-bullhorn me-2"></i> PANGGIL SEKARANG
                            </button>
                        </form>
                    </div>
                    @endif

                    {{-- Daftar Antrian --}}
                    <h6 class="fw-bold mb-3 text-success">Daftar Menunggu ({{ $waitingPatients->count() }} orang):</h6>
                    <div class="row g-2">
                        @foreach($waitingPatients->take(4) as $index => $patient)
                        <div class="col-md-6">
                            <div class="queue-item d-flex align-items-center p-3 border rounded shadow-sm bg-white">
                                <div class="queue-number bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <span class="fw-bold">{{ $index + 1 }}</span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 fw-bold text-dark">{{ $patient->name }}</h6>
                                    <small class="text-muted">{{ $patient->created_at->format('H:i') }}</small>
                                </div>
                                <form action="{{ route('dokter.panggil', $patient->id) }}" method="POST" class="ms-2">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success btn-sm hover-scale">
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

        {{-- Panel Statistik --}}
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0"><i class="fas fa-chart-pie me-2"></i> STATISTIK HARI INI</h5>
                </div>
                <div class="card-body">
                    <div class="stats-grid row text-center">
                        <div class="col-6 mb-3">
                            <div class="stat-value text-warning fw-bold display-6">{{ $pasien->where('status_antrian', 'menunggu')->count() }}</div>
                            <div class="stat-label text-muted">Menunggu</div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="stat-value text-info fw-bold display-6">{{ $pasien->where('status_antrian', 'dipanggil')->count() }}</div>
                            <div class="stat-label text-muted">Dipanggil</div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="stat-value text-primary fw-bold display-6">{{ $pasien->where('status_antrian', 'dalam pemeriksaan')->count() }}</div>
                            <div class="stat-label text-muted">Pemeriksaan</div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="stat-value text-success fw-bold display-6">{{ $pasien->where('status_antrian', 'selesai')->count() }}</div>
                            <div class="stat-label text-muted">Selesai</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Riwayat Panggilan --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0"><i class="fas fa-history me-2"></i> RIWAYAT PANGGILAN</h5>
                </div>
                <div class="card-body">
                    @php
                        $recentCalls = $pasien->where('status_antrian', 'selesai')->take(5);
                    @endphp

                    @if($recentCalls->count() > 0)
                        @foreach($recentCalls as $call)
                        <div class="timeline-item border-start border-3 border-success ps-3 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold text-dark">{{ $call->name }}</h6>
                                    <p class="mb-1 text-muted">No. RM: {{ $call->no_rm ?? 'RM-' . str_pad($call->id, 6, '0', STR_PAD_LEFT) }}</p>
                                    <small class="text-success"><i class="fas fa-check-circle me-1"></i> Selesai: {{ $call->updated_at->format('H:i') }}</small>
                                </div>
                                <form action="{{ route('dokter.hapus', $call->id) }}" method="POST" onsubmit="return confirm('Hapus dari riwayat?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-times"></i></button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="text-center py-4 text-muted">
                        <i class="fas fa-history fa-3x mb-3"></i><br>Belum ada riwayat panggilan hari ini
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- STYLE --}}
<style>
.bg-gradient-to-r { background: linear-gradient(90deg, var(--tw-gradient-stops)); }
.from-yellow-400 { --tw-gradient-stops: #facc15, #fbbf24; }
.to-yellow-600 { --tw-gradient-stops: #facc15, #d97706; }
.from-green-500 { --tw-gradient-stops: #22c55e, #16a34a; }
.to-green-700 { --tw-gradient-stops: #22c55e, #15803d; }

.pulse-ring i, .ringing-bell i { animation: pulse 1.5s infinite; }
@keyframes pulse { 0%,100%{transform:scale(1);}50%{transform:scale(1.15);} }

.hover-scale { transition: transform .2s ease, box-shadow .2s ease; }
.hover-scale:hover { transform: scale(1.05); box-shadow: 0 8px 20px rgba(0,0,0,0.2); }
.card { border-radius: 1.2rem !important; }
</style>

{{-- AUTO REFRESH --}}
<script>
setTimeout(() => { location.reload(); }, 10000);
</script>
@endsection
