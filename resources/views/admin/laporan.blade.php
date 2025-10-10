@extends('layout.admin')

@section('title', 'Kelola Laporan')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="bi bi-file-earmark-text"></i> Kelola Laporan</h4>
            <a href="#" class="btn btn-light btn-sm text-success fw-semibold">
                <i class="bi bi-plus-circle"></i> Tambah Laporan
            </a>
        </div>

        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0">
                    <thead class="table-success text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul Laporan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        {{-- Contoh data dummy sementara --}}
                        <tr>
                            <td>1</td>
                            <td class="fw-semibold text-start">
                                <i class="bi bi-journal-text text-success me-2"></i> Laporan Harian Poli Umum
                            </td>
                            <td>07 Oktober 2025</td>
                            <td>
                                <span class="badge bg-success bg-opacity-75">Selesai</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill me-1">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        <tr class="table-light">
                            <td>2</td>
                            <td class="fw-semibold text-start">
                                <i class="bi bi-journal-medical text-success me-2"></i> Rekap Mingguan Pasien
                            </td>
                            <td>05 Oktober 2025</td>
                            <td>
                                <span class="badge bg-warning text-dark">Proses</span>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary rounded-pill me-1">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-warning rounded-pill me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-outline-danger rounded-pill">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        <tr class="table-light">
                            <td colspan="5" class="text-muted text-center py-4">
                                <i class="bi bi-exclamation-circle"></i> Belum ada data laporan.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
