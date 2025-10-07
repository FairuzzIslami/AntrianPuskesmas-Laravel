@extends('layout.admin')

@section('title', 'Kelola Dokter')

@section('content')
<div class="container py-4">

    <!-- Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-success mb-1"><i class="bi bi-person-badge"></i> Kelola Dokter</h2>
            <p class="text-muted mb-0">Kelola dan pantau daftar dokter di Puskesmas Anda.</p>
        </div>
        <a href="{{ route('admin.dokter.create') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Dokter
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-start border-4 border-success shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card -->
    <div class="card border-0 shadow rounded-4 overflow-hidden">
        <div class="card-header bg-gradient text-white fw-semibold py-3"
            style="background: linear-gradient(90deg, #198754, #20c997);">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
                <span><i class="bi bi-people-fill me-2"></i> Daftar Dokter</span>
                <form class="d-flex align-items-center mt-2 mt-md-0" role="search">
                    <input type="text" class="form-control form-control-sm rounded-pill me-2 shadow-sm"
                        placeholder="Cari nama dokter..." style="min-width: 200px;">
                    <button class="btn btn-light btn-sm rounded-pill shadow-sm">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-success text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokter as $index => $d)
                            <tr class="text-center">
                                <td class="text-center fw-semibold">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                        <div>
                                            <span class="fw-semibold">{{ $d->name }}</span><br>
                                            <small class="text-muted">Dokter Umum</small>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $d->email }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.dokter.edit', $d->id) }}" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.dokter.destroy', $d->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-pill"
                                            onclick="return confirm('Yakin hapus dokter ini?')">
                                            <i class="bi bi-trash3"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="bi bi-exclamation-circle"></i> Belum ada data dokter
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white text-end py-3">
            <small class="text-muted">Total Dokter: {{ count($dokter) }}</small>
        </div>
    </div>
</div>

<!-- Style tambahan -->
<style>
    .table thead th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .table tbody tr:hover {
        background-color: #f3fdf6 !important;
        transition: all 0.2s ease-in-out;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107 !important;
        color: white !important;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545 !important;
        color: white !important;
    }

    .card-header form input:focus {
        box-shadow: 0 0 5px rgba(25, 135, 84, 0.4);
    }
</style>
@endsection
