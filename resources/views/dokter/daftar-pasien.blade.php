@extends('layout.navbar-dokter')

@section('content')
<div class="container-fluid py-4">
    <!-- Header dengan Statistik -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body bg-gradient-success text-white rounded-3">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="fw-bold mb-2">Manajemen Pasien</h2>
                            <p class="mb-0">Kelola antrian dan status pemeriksaan pasien dengan mudah</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="bg-white text-success rounded p-3 d-inline-block">
                                <h4 class="mb-0 fw-bold">{{ $pasien->count() }}</h4>
                                <small>Total Pasien Hari Ini</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Cepat -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-warning shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-1">
                                Menunggu
                            </div>
                            <div class="h5 mb-0 fw-bold text-gray-800">
                                {{ $pasien->where('status_antrian', 'menunggu')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clock fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-primary shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">
                                Dipanggil
                            </div>
                            <div class="h5 mb-0 fw-bold text-gray-800">
                                {{ $pasien->where('status_antrian', 'dipanggil')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bell fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-info shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-info text-uppercase mb-1">
                                Dalam Pemeriksaan
                            </div>
                            <div class="h5 mb-0 fw-bold text-gray-800">
                                {{ $pasien->where('status_antrian', 'dalam_pemeriksaan')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-stethoscope fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start-success shadow h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">
                                Selesai
                            </div>
                            <div class="h5 mb-0 fw-bold text-gray-800">
                                {{ $pasien->where('status_antrian', 'selesai')->count() }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter dan Pencarian -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Filter Status</label>
                            <select class="form-select" id="statusFilter">
                                <option value="">Semua Status</option>
                                <option value="menunggu">Menunggu</option>
                                <option value="dipanggil">Dipanggil</option>
                                <option value="dalam_pemeriksaan">Dalam Pemeriksaan</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Cari Pasien</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchInput" placeholder="Cari berdasarkan nama atau email...">
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button class="btn btn-outline-secondary w-100" id="resetFilter">
                                <i class="fas fa-refresh me-2"></i>Reset
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pasien -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold text-success">
                        <i class="fas fa-list me-2"></i>Daftar Pasien
                    </h5>
                </div>
                <div class="card-body p-0">
                    @if($pasien->isEmpty())
                    <div class="text-center py-5">
                        <i class="fas fa-user-injured fa-4x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum ada pasien terdaftar</h4>
                        <p class="text-muted">Pasien yang mendaftar akan muncul di sini</p>
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="patientsTable">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Pasien</th>
                                    <th>Kontak</th>
                                    <th>Waktu Daftar</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pasien as $index => $p)
                                <tr class="patient-row" data-status="{{ $p->status_antrian }}">
                                    <td class="ps-4 fw-bold">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar bg-success text-white rounded-circle me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                {{ strtoupper(substr($p->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">{{ $p->name }}</h6>
                                                <small class="text-muted">No. RM: {{ $p->no_rm ?? 'RM-' . str_pad($p->id, 6, '0', STR_PAD_LEFT) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="mb-1">
                                                <i class="fas fa-envelope me-2 text-muted"></i>
                                                <small>{{ $p->email }}</small>
                                            </div>
                                            <div>
                                                <i class="fas fa-phone me-2 text-muted"></i>
                                                <small>{{ $p->phone ?? '- Belum diisi -' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $p->created_at->format('H:i') }}</small>
                                        <br>
                                        <small class="text-muted">{{ $p->created_at->format('d/m/Y') }}</small>
                                    </td>
                                    <td>
                                        @if($p->status_antrian == 'menunggu')
                                            <span class="badge bg-warning text-dark py-2 px-3">
                                                <i class="fas fa-clock me-1"></i>Menunggu
                                            </span>
                                        @elseif($p->status_antrian == 'dipanggil')
                                            <span class="badge bg-primary text-white py-2 px-3">
                                                <i class="fas fa-bell me-1"></i>Dipanggil
                                            </span>
                                        @elseif($p->status_antrian == 'dalam_pemeriksaan')
                                            <span class="badge bg-info text-white py-2 px-3">
                                                <i class="fas fa-stethoscope me-1"></i>Dalam Pemeriksaan
                                            </span>
                                        @else
                                            <span class="badge bg-success text-white py-2 px-3">
                                                <i class="fas fa-check-circle me-1"></i>Selesai
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            @if($p->status_antrian == 'menunggu')
                                                <button class="btn btn-primary btn-sm call-patient" data-id="{{ $p->id }}" data-name="{{ $p->name }}">
                                                    <i class="fas fa-bell me-1"></i>Panggil
                                                </button>
                                            @elseif($p->status_antrian == 'dipanggil')
                                                <button class="btn btn-info btn-sm start-examination" data-id="{{ $p->id }}">
                                                    <i class="fas fa-play me-1"></i>Mulai
                                                </button>
                                            @elseif($p->status_antrian == 'dalam_pemeriksaan')
                                                <button class="btn btn-success btn-sm finish-examination" data-id="{{ $p->id }}">
                                                    <i class="fas fa-check me-1"></i>Selesai
                                                </button>
                                            @endif
                                            <button class="btn btn-outline-secondary btn-sm view-details" data-id="{{ $p->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
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
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 15px;
    }
    
    .card-header {
        border-radius: 15px 15px 0 0 !important;
    }
    
    .avatar {
        font-weight: bold;
        font-size: 1.1rem;
    }
    
    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
    }
    
    .border-start-warning {
        border-left: 4px solid #ffc107 !important;
    }
    
    .border-start-primary {
        border-left: 4px solid #0d6efd !important;
    }
    
    .border-start-info {
        border-left: 4px solid #0dcaf0 !important;
    }
    
    .border-start-success {
        border-left: 4px solid #198754 !important;
    }
    
    .btn-group .btn {
        border-radius: 8px;
        margin: 0 2px;
    }
    
    .patient-row:hover {
        background-color: #f8f9fa;
        transform: translateY(-1px);
        transition: all 0.2s ease;
    }
    
    .bg-gradient-success {
        background: linear-gradient(135deg, #198754 0%, #2e7d32 100%) !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter status
        const statusFilter = document.getElementById('statusFilter');
        const searchInput = document.getElementById('searchInput');
        const resetFilter = document.getElementById('resetFilter');
        const patientRows = document.querySelectorAll('.patient-row');
        
        function filterPatients() {
            const statusValue = statusFilter.value.toLowerCase();
            const searchValue = searchInput.value.toLowerCase();
            
            patientRows.forEach(row => {
                const status = row.getAttribute('data-status');
                const name = row.querySelector('h6').textContent.toLowerCase();
                const email = row.querySelector('.fa-envelope').parentNode.textContent.toLowerCase();
                
                const statusMatch = !statusValue || status === statusValue;
                const searchMatch = !searchValue || name.includes(searchValue) || email.includes(searchValue);
                
                if (statusMatch && searchMatch) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
        
        statusFilter.addEventListener('change', filterPatients);
        searchInput.addEventListener('input', filterPatients);
        
        resetFilter.addEventListener('click', function() {
            statusFilter.value = '';
            searchInput.value = '';
            filterPatients();
        });
        
        // Aksi tombol
        document.querySelectorAll('.call-patient').forEach(button => {
            button.addEventListener('click', function() {
                const patientId = this.getAttribute('data-id');
                const patientName = this.getAttribute('data-name');
                
                if (confirm(`Panggil pasien ${patientName}?`)) {
                    // Simulasi panggilan pasien
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Memanggil...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        alert(`Pasien ${patientName} berhasil dipanggil!`);
                        // Di sini biasanya ada AJAX request untuk update status
                        location.reload();
                    }, 1500);
                }
            });
        });
        
        document.querySelectorAll('.start-examination').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Mulai pemeriksaan pasien?')) {
                    // Simulasi mulai pemeriksaan
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Memulai...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        alert('Pemeriksaan dimulai!');
                        // Di sini biasanya ada AJAX request untuk update status
                        location.reload();
                    }, 1500);
                }
            });
        });
        
        document.querySelectorAll('.finish-examination').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('Selesaikan pemeriksaan pasien?')) {
                    // Simulasi selesai pemeriksaan
                    this.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Menyelesaikan...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        alert('Pemeriksaan selesai!');
                        // Di sini biasanya ada AJAX request untuk update status
                        location.reload();
                    }, 1500);
                }
            });
        });
        
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', function() {
                const patientId = this.getAttribute('data-id');
                alert(`Menampilkan detail pasien dengan ID: ${patientId}\n\nFitur ini akan menampilkan modal dengan detail lengkap pasien.`);
                // Di sini biasanya ada kode untuk menampilkan modal detail
            });
        });
    });
</script>
@endsection