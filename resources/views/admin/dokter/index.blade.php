@extends('layout.admin')

@section('title', 'Kelola Dokter')

@section('content')
<div class="container py-5">
    <h2>Kelola Dokter</h2>

    <a href="{{ route('admin.dokter.create') }}" class="btn btn-primary mb-3">+ Tambah Dokter</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dokter as $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->email }}</td>
                    <td>
                        <a href="{{ route('admin.dokter.edit', $d->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.dokter.destroy', $d->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus dokter ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Belum ada data dokter</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
