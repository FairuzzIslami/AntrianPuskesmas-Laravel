@extends('layout.navbar-dokter')

@section('content')
<div class="container mt-4">
    <h3>Catatan Medis: {{ $pasien->name }}</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('dokter.catatan-medis.store', $pasien->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="diagnosa" class="form-label">Diagnosa</label>
            <input type="text" class="form-control" id="diagnosa" name="diagnosa" required>
        </div>

        <div class="mb-3">
            <label for="tindakan" class="form-label">Tindakan</label>
            <textarea class="form-control" id="tindakan" name="tindakan" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="resep_obat" class="form-label">Resep Obat</label>
            <textarea class="form-control" id="resep_obat" name="resep_obat" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Catatan</button>
        <a href="{{ route('dokter.daftar-pasien') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
