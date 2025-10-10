@extends('layout.navbar-dokter')

@section('content')
    <div class="container py-4 animate__animated animate__fadeIn">

        {{-- HEADER --}}
        <div class="card shadow border-0 rounded-4 mb-4 overflow-hidden">
            <div class="card-body bg-gradient-success text-white p-4 d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="fw-bold mb-1"><i class="fas fa-file-medical-alt me-2"></i>Tambah Laporan Pemeriksaan</h3>
                    <p class="mb-0">Isi laporan pemeriksaan pasien dengan lengkap dan akurat</p>
                </div>
                <img src="https://cdn-icons-png.flaticon.com/512/4320/4320423.png" width="70" alt="medical-icon">
            </div>
        </div>

        {{-- FORM --}}
        <div class="card shadow-lg border-0 rounded-4 mb-5">
            <div class="card-body p-4">
                <form action="{{ route('dokter.laporan.store') }}" method="POST">
                    @csrf

                    {{-- Dokter ID --}}
                    <input type="hidden" name="dokter_id" value="{{ auth()->user()->id }}">

                    {{-- Info Pasien --}}
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 text-center">
                            <img src="{{ $pasien->foto ?? 'https://cdn-icons-png.flaticon.com/512/4140/4140048.png' }}"
                                class="rounded-circle shadow-sm" width="100" height="100" alt="foto pasien">
                        </div>
                        <div class="col-md-9">
                            <label class="form-label fw-bold text-success">Nama Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control border-success mb-3"
                                value="{{ $pasien->name }}" readonly>

                            <label class="form-label fw-bold text-success">Tanggal Pemeriksaan</label>
                            <input type="text" name="tanggal_pemeriksaan" class="form-control border-success"
                                value="{{ now()->format('d F Y, H:i') }}" readonly>
                        </div>
                    </div>

                    <hr>

                    {{-- Diagnosa --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold text-success">Diagnosa</label>
                        <input type="text" name="diagnosa" class="form-control border-success"
                            placeholder="Masukkan hasil diagnosa pasien" required>
                    </div>

                    {{-- Data Vital --}}
                    <div class="row mb-3">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold text-success">Tekanan Darah</label>
                                <input type="text" name="tekanan_darah" class="form-control border-success"
                                    placeholder="Misal: 120/80 mmHg">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold text-success">Suhu Tubuh</label>
                                <input type="text" name="suhu_tubuh" class="form-control border-success"
                                    placeholder="Misal: 36.5 °C">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold text-success">Detak Jantung</label>
                                <input type="text" name="detak_jantung" class="form-control border-success"
                                    placeholder="Misal: 75 bpm">
                            </div>
                        </div>

                        {{-- Catatan Medis --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-success">Catatan Medis</label>
                            <textarea name="catatan_medis" rows="4" class="form-control border-success"
                                placeholder="Tuliskan catatan tambahan atau saran pengobatan (opsional)"></textarea>
                        </div>

                        {{-- Resep Obat --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold text-success">Resep Obat</label>
                            <textarea name="resep_obat" rows="3" class="form-control border-success"
                                placeholder="Masukkan resep obat (opsional)"></textarea>
                        </div>


                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('dokter.dashboard') }}" class="btn btn-outline-secondary btn-lg px-4">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-success btn-lg px-4">
                                <i class="fas fa-paper-plane me-1"></i> Kirim ke Admin
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    {{-- STYLE TAMBAHAN --}}
    <style>
        .bg-gradient-success {
            background: linear-gradient(135deg, #43a047, #2e7d32) !important;
        }

        .btn-success {
            background: linear-gradient(135deg, #43a047, #388e3c);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(67, 160, 71, 0.5);
        }

        .btn-outline-secondary:hover {
            background-color: #e0e0e0;
            color: #000;
        }

        .form-control:focus {
            border-color: #43a047;
            box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.25);
        }

        label {
            font-size: 0.95rem;
        }

        hr {
            border-top: 2px solid #e8f5e9;
        }

        textarea {
            resize: none;
        }

        .rounded-circle {
            object-fit: cover;
        }
    </style>
@endsection
