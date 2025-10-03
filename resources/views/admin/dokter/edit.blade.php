@extends('layout.admin')

@section('title', 'Edit Dokter')

@section('content')
<div class="container py-5">
    <h2>Edit Dokter</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nama Dokter</label>
            <input type="text" name="name" id="name"
                   class="form-control"
                   value="{{ old('name', $dokter->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Dokter</label>
            <input type="email" name="email" id="email"
                   class="form-control"
                   value="{{ old('email', $dokter->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password (opsional)</label>
            <input type="password" name="password" id="password"
                   class="form-control" placeholder="Kosongkan jika tidak ingin ubah password">
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.dokter') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
