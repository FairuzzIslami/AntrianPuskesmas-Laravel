@extends('layout.navbar-dokter')

@section('content')
<div class="container-fluid py-4">
    @php
        $currentPatient = $pasien->where('status_antrian', 'dipanggil')->first();
        $examiningPatient = $pasien->where('status_antrian', 'dalam pemeriksaan')->first();
    @endphp

    {{-- Banner Pemeriksaan Aktif --}}
    @if($examiningPatient)
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-lg border-0 call-banner bg-gradient-warning">
                <div class="card-body text-white text-center py-5">
                    <div class="pulse-animation mb-3">
                        <i class="fas fa-stethoscope fa-4x"></i>
                    </div>
                    <h1 class="display-5 fw-bold mb-3">PASIEN SEDANG DALAM PEMERIKSAAN</h1>
                    <div class="patient-info mb-4">
                        <h2 class="fw-bold mb-2">{{ $examiningPatient->name }}</h2>
                        <p class="mb-1">No. RM: {{ $examiningPatient->no_rm ?? 'RM-' . str_pad($examiningPatient->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <form action="{{ route('dokter.selesai', $examiningPatient->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-light btn-lg px-5 py-3 fw-bold">
                            <i class="fas fa-check-circle me-2"></i>PEMERIKSAAN SELESAI
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @elseif($currentPatient)
    {{-- Banner Panggilan Aktif --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-lg border-0 call-banner">
                <div class="card-body text-white text-center py-5">
                    <div class="pulse-animation mb-3">
                        <i class="fas fa-bell fa-4x"></i>
                    </div>
                    <h1 class="display-5 fw-bold mb-3">PASIEN SEDANG DIPANGGIL</h1>
                    <div class="patient-info mb-4">
                        <h2 class="fw-bold mb-2">{{ $currentPatient->name }}</h2>
                        <p class="mb-1">No. RM: {{ $currentPatient->no_rm ?? 'RM-' . str_pad($currentPatient->id, 6, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <form action="{{ route('dokter.mulai', $currentPatient->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-warning btn-lg px-5 py-3 fw-bold text-dark">
                            <i class="fas fa-play-circle me-2"></i>MULAI PEMERIKSAAN
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
        <div class="col-lg-8">
            {{-- Panel Antrian --}}
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-clock me-2"></i>ANTRIAN REAL-TIME
                    </h5>
                </div>
                <div class="card-body">
                    @php
                        $waitingPatients = $pasien->where('status_antrian', 'menunggu');
                        $nextPatient = $waitingPatients->first();
                    @endphp

                    @if($nextPatient)
                    <div class="next-patient-card text-center p-4 mb-4">
                        <div class="next-badge">BERIKUTNYA</div>
                        <h3 class="text-success fw-bold mt-2">{{ $nextPatient->name }}</h3>
                        <p class="text-muted">No. Antrian: A-{{ str_pad($waitingPatients->keys()->first() + 1, 3, '0', STR_PAD_LEFT) }}</p>
                        
                        <form action="{{ route('dokter.panggil', $nextPatient->id) }}" method="POST" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg px-4 call-now-btn">
                                <i class="fas fa-bullhorn me-2"></i>PANGGIL SEKARANG
                            </button>
                        </form>
                    </div>
                    @endif

                    {{-- Daftar Antrian --}}
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

        {{-- Panel Statistik --}}
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0"><i class="fas fa-chart-pie me-2"></i>STATISTIK HARI INI</h5>
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
                            <div class="stat-value text-primary fw-bold display-6">
                                {{ $pasien->where('status_antrian', 'dalam pemeriksaan')->count() }}
                            </div>
                            <div class="stat-label text-muted">Pemeriksaan</div>
                        </div>
                        <div class="stat-item text-center p-3">
                            <div class="stat-value text-success fw-bold display-6">
                                {{ $pasien->where('status_antrian', 'selesai')->count() }}
                            </div>
                            <div class="stat-label text-muted">Selesai</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Riwayat --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="card-title mb-0"><i class="fas fa-history me-2"></i>RIWAYAT PANGGILAN</h5>
                </div>
                <div class="card-body">
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
                                    <form action="{{ route('dokter.hapus', $call->id) }}" method="POST" onsubmit="return confirm('Hapus dari riwayat?');">
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
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-history fa-3x mb-3"></i><br>
                            Belum ada riwayat panggilan hari ini
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-gradient-warning {
    background: linear-gradient(135deg, #44e935 0%, #1e690f 100%);
}
</style>

<script>
// efek suara & auto refresh tetap seperti versi kamu sebelumnya
</script>
@endsection
