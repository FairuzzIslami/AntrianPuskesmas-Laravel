@extends('layout.navbar-dokter')

@section('content')
<div class="container-fluid py-4 animate__animated animate__fadeIn">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow border-0 rounded-4 overflow-hidden">
                <div class="card-body bg-gradient-success text-white p-4">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div>
                            <h2 class="fw-bold mb-2">Manajemen Pasien</h2>
                            <p class="mb-0 text-light">Kelola antrian dan status pemeriksaan pasien dengan mudah</p>
                        </div>
                        <div class="bg-white text-success rounded-4 shadow-sm p-3 text-center mt-3 mt-md-0">
                            <h4 class="fw-bold mb-0">{{ $pasien->count() }}</h4>
                            <small class="text-muted">Total Pasien Hari Ini</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- STATISTIK PASIEN --}}
    <div class="row g-4 mb-4">
        @php
            $statusList = [
                ['label' => 'Menunggu', 'icon' => 'fa-clock', 'value' => 'menunggu'],
                ['label' => 'Dipanggil', 'icon' => 'fa-bell', 'value' => 'dipanggil'],
                ['label' => 'Dalam Pemeriksaan', 'icon' => 'fa-stethoscope', 'value' => 'dalam pemeriksaan'],
                ['label' => 'Selesai', 'icon' => 'fa-check-circle', 'value' => 'selesai'],
            ];
        @endphp

        @foreach ($statusList as $s)
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card border-0 shadow-sm bg-light-green rounded-4 h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-success text-uppercase fw-bold mb-1">{{ $s['label'] }}</h6>
                        <h4 class="fw-bold mb-0">{{ $pasien->where('status_antrian', $s['value'])->count() }}</h4>
                    </div>
                    <i class="fas {{ $s['icon'] }} fa-2x text-success"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- FILTER & PENCARIAN --}}
    <div class="card border-0 shadow-sm mb-4 rounded-4">
        <div class="card-body">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-bold text-success">Filter Status</label>
                    <select class="form-select border-success" id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="menunggu">Menunggu</option>
                        <option value="dipanggil">Dipanggil</option>
                        <option value="dalam pemeriksaan">Dalam Pemeriksaan</option>
                        <option value="selesai">Selesai</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold text-success">Cari Pasien</label>
                    <div class="input-group">
                        <span class="input-group-text bg-success text-white border-success">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control border-success" id="searchInput"
                            placeholder="Cari nama atau email...">
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success w-100" id="resetFilter">
                        <i class="fas fa-rotate-right me-2"></i>Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL PASIEN --}}
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-success text-white rounded-top-4">
            <h5 class="fw-bold mb-0"><i class="fas fa-list me-2"></i>Daftar Pasien</h5>
        </div>

        <div class="card-body p-0">
            @if ($pasien->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-user-injured fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum ada pasien terdaftar</h4>
                    <p class="text-muted mb-0">Pasien yang mendaftar akan muncul di sini</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="patientsTable">
                        <thead class="table-success">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Pasien</th>
                                <th>Kontak</th>
                                <th>Waktu Daftar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $index => $p)
                            <tr class="patient-row" data-status="{{ $p->status_antrian }}">
                                <td class="ps-4 fw-bold text-success">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center">
                                            {{ strtoupper(substr($p->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold">{{ $p->name }}</h6>
                                            <small class="text-muted">No. RM:
                                                {{ $p->no_rm ?? 'RM-' . str_pad($p->id, 6, '0', STR_PAD_LEFT) }}
                                            </small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <small><i class="fas fa-envelope me-2 text-success"></i>{{ $p->email }}</small><br>
                                    <small><i class="fas fa-phone me-2 text-success"></i>{{ $p->phone ?? '-' }}</small>
                                </td>
                                <td><small class="text-muted">{{ $p->created_at->format('H:i d/m/Y') }}</small></td>
                                <td>
                                    @switch($p->status_antrian)
                                        @case('menunggu')
                                            <span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i>Menunggu</span>
                                            @break
                                        @case('dipanggil')
                                            <span class="badge bg-primary"><i class="fas fa-bell me-1"></i>Dipanggil</span>
                                            @break
                                        @case('dalam pemeriksaan')
                                            <span class="badge bg-info text-dark"><i class="fas fa-stethoscope me-1"></i>Pemeriksaan</span>
                                            @break
                                        @default
                                            <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Selesai</span>
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('dokter.laporan.create', $p->id) }}" class="btn btn-sm btn-success rounded-pill">
                                        <i class="fas fa-file-medical-alt me-1"></i> Laporan
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

{{-- STYLE --}}
<style>
    .bg-gradient-success {
        background: linear-gradient(135deg, #66bb6a 0%, #43a047 100%) !important;
    }
    .bg-light-green {
        background-color: #e8f5e9 !important;
    }
    .avatar {
        width: 40px;
        height: 40px;
        font-weight: bold;
        font-size: 1rem;
    }
    .stat-card {
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
    }
    .table-hover tbody tr:hover {
        background-color: #f1f8e9 !important;
    }
    .btn-success {
        background-color: #43a047 !important;
        border-color: #43a047 !important;
    }
    .btn-success:hover {
        background-color: #2e7d32 !important;
        border-color: #2e7d32 !important;
    }
</style>

{{-- SCRIPT FILTER --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const statusFilter = document.getElementById('statusFilter');
        const searchInput = document.getElementById('searchInput');
        const resetFilter = document.getElementById('resetFilter');
        const rows = document.querySelectorAll('.patient-row');

        function filterTable() {
            const status = statusFilter.value.toLowerCase();
            const search = searchInput.value.toLowerCase();

            rows.forEach(row => {
                const rowStatus = row.dataset.status?.toLowerCase() || '';
                const name = row.querySelector('td:nth-child(2)').innerText.toLowerCase();
                const email = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
                const matchStatus = !status || rowStatus === status;
                const matchSearch = name.includes(search) || email.includes(search);
                row.style.display = matchStatus && matchSearch ? '' : 'none';
            });
        }

        statusFilter.addEventListener('change', filterTable);
        searchInput.addEventListener('keyup', filterTable);
        resetFilter.addEventListener('click', () => {
            statusFilter.value = '';
            searchInput.value = '';
            filterTable();
        });
    });
</script>
@endsection
