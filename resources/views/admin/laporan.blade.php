@extends('layout.admin')

@section('title', 'Kelola Laporan Pemeriksaan')

@section('content')
<div class="container py-5 animate__animated animate__fadeIn">

    <div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold text-success mb-0"><i class="bi bi-clipboard2-pulse me-2"></i>Kelola Laporan Pemeriksaan</h3>
    <div>
        <a href="{{ route('laporan.export.pdf') }}" class="btn btn-danger me-2 shadow-sm">
            <i class="bi bi-file-earmark-pdf me-1"></i> Export PDF
        </a>
        <a href="{{ route('laporan.export.excel') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-file-earmark-excel me-1"></i> Export Excel
        </a>
    </div>
</div>


    {{-- Tabel --}}
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body bg-light">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-success text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Nama Pasien</th>
                            <th>Diagnosa</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $l)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $l->dokter->name ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $l->nama_pasien }}</td>
                            <td>{{ $l->diagnosa }}</td>
                            <td>{{ \Carbon\Carbon::parse($l->tanggal_pemeriksaan)->format('d M Y H:i') }}</td>
                            <td class="text-center">
                                {{-- Tombol Detail --}}
                                <button class="btn btn-outline-success btn-sm me-1" data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $l->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>

                                {{-- Tombol Hapus --}}
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#hapusModal{{ $l->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- Modal Detail --}}
                        <div class="modal fade" id="detailModal{{ $l->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $l->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content rounded-4 border-0 shadow">
                                    <div class="modal-header bg-success text-white rounded-top-4">
                                        <h5 class="modal-title"><i class="bi bi-clipboard2-pulse me-2"></i>Detail Laporan Pemeriksaan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <p><strong>Nama Dokter:</strong> {{ $l->dokter->name ?? '-' }}</p>
                                                <p><strong>Nama Pasien:</strong> {{ $l->nama_pasien }}</p>
                                                <p><strong>Diagnosa:</strong> {{ $l->diagnosa }}</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <p><strong>Tanggal Pemeriksaan:</strong> {{ \Carbon\Carbon::parse($l->tanggal_pemeriksaan)->format('d M Y H:i') }}</p>
                                                <p><strong>Tekanan Darah:</strong> {{ $l->tekanan_darah ?? '-' }}</p>
                                                <p><strong>Suhu Tubuh:</strong> {{ $l->suhu_tubuh ? $l->suhu_tubuh . ' °C' : '-' }}</p>
                                                <p><strong>Detak Jantung:</strong> {{ $l->detak_jantung ? $l->detak_jantung . ' bpm' : '-' }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p><strong>Catatan Medis:</strong><br>{{ $l->catatan_medis ?? '-' }}</p>
                                        <p><strong>Resep Obat:</strong><br>{{ $l->resep_obat ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Konfirmasi Hapus --}}
                        <div class="modal fade" id="hapusModal{{ $l->id }}" tabindex="-1" aria-labelledby="hapusModalLabel{{ $l->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 border-0 shadow">
                                    <div class="modal-header bg-danger text-white rounded-top-4">
                                        <h5 class="modal-title"><i class="bi bi-exclamation-triangle me-2"></i>Konfirmasi Hapus</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p>Apakah Anda yakin ingin menghapus laporan pemeriksaan <strong>{{ $l->nama_pasien }}</strong>?</p>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <form action="{{ route('laporan.destroy', $l->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-4">Hapus</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada laporan pemeriksaan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- STYLE TAMBAHAN --}}
<style>
    .table-hover tbody tr:hover {
        background-color: #f1f8f4;
        transition: 0.2s ease;
    }

    .btn-outline-success, .btn-outline-danger {
        border-radius: 10px;
        transition: 0.2s ease;
    }

    .btn-outline-success:hover {
        background-color: #43a047;
        color: white;
    }

    .btn-outline-danger:hover {
        background-color: #e53935;
        color: white;
    }

    .modal-content {
        border-radius: 20px;
    }

    .bg-success {
        background: linear-gradient(135deg, #43a047, #2e7d32) !important;
    }
</style>
@endsection
