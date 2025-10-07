@extends('layout.admin')

@section('title', 'Edit Dokter')

@section('content')
<div class="container py-5">
    <div class="card shadow border-0 rounded-4 overflow-hidden">
        {{-- Header --}}
        <div class="card-header bg-success bg-gradient text-white py-3 d-flex align-items-center">
            <i class="bi bi-pencil-square fs-4 me-2"></i>
            <h4 class="mb-0 fw-semibold">Edit Data Dokter</h4>
        </div>

        <div class="card-body bg-light">
            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="alert alert-danger border-0 shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form --}}
            <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Dokter</label>
                    <div class="input-group">
                        <span class="input-group-text bg-success bg-opacity-10 text-success">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" name="name" id="name"
                               class="form-control shadow-sm"
                               value="{{ old('name', $dokter->name) }}" required>
                    </div>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Dokter</label>
                    <div class="input-group">
                        <span class="input-group-text bg-success bg-opacity-10 text-success">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" name="email" id="email"
                               class="form-control shadow-sm"
                               value="{{ old('email', $dokter->email) }}" required>
                    </div>
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold">Password (opsional)</label>
                    <div class="input-group">
                        <span class="input-group-text bg-success bg-opacity-10 text-success">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" name="password" id="password"
                               class="form-control shadow-sm"
                               placeholder="Kosongkan jika tidak ingin ubah password">
                    </div>
                    <small class="text-muted fst-italic">
                        Biarkan kosong jika tidak ingin mengganti password dokter.
                    </small>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.dokter') }}" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-success rounded-pill px-4 shadow-sm">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Sedikit gaya tambahan --}}
<style>
    .card {
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-2px);
    }
    .btn-success:hover {
        background-color: #157347 !important;
        box-shadow: 0 3px 10px rgba(25, 135, 84, 0.3);
    }
    .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
    }
</style>
@endsection
