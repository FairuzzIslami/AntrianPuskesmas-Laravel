@extends('layout.admin')

@section('title', 'Kelola Dokter')

@section('content')
<div class="container py-5">
    <h2>Kelola Dokter</h2>
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
                        <button class="btn btn-sm btn-warning">Edit</button>
                        <button class="btn btn-sm btn-danger">Hapus</button>
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
