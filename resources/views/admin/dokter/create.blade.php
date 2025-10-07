@extends('layout.admin')

@section('title', 'Tambah Dokter')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-gradient bg-success text-white py-3 d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 fw-semibold">
                        <i class="bi bi-person-plus me-2"></i> Tambah Dokter
                    </h4>
                    <a href="{{ route('admin.dokter') }}" class="btn btn-light btn-sm d-flex align-items-center">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>

                <div class="card-body p-4 bg-light">
                    {{-- Error Validation --}}
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('admin.dokter.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person-circle me-1 text-success"></i> Nama Dokter
                            </label>
                            <input type="text" name="name" id="name"
                                   class="form-control shadow-sm" placeholder="Masukkan nama lengkap dokter"
                                   value="{{ old('name') }}" required>
                            <div class="invalid-feedback">Nama wajib diisi.</div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                <i class="bi bi-envelope-fill me-1 text-success"></i> Email Dokter
                            </label>
                            <input type="email" name="email" id="email"
                                   class="form-control shadow-sm" placeholder="contoh: dokter@mail.com"
                                   value="{{ old('email') }}" required>
                            <div class="invalid-feedback">Email wajib diisi dengan format yang benar.</div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">
                                <i class="bi bi-lock-fill me-1 text-success"></i> Password
                            </label>
                            <input type="password" name="password" id="password"
                                   class="form-control shadow-sm" placeholder="Masukkan password minimal 6 karakter"
                                   required>
                            <div class="invalid-feedback">Password wajib diisi.</div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-check-circle me-1"></i> Simpan
                            </button>
                            <button type="reset" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-x-circle me-1"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center text-muted small py-2">
                    <i class="bi bi-hospital me-1"></i> Sistem Puskesmas • 2025
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Validasi form Bootstrap --}}
<script>
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>
@endsection
