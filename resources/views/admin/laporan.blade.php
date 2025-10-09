@extends('layout.admin')

@section('title', 'Kelola Laporan')

@section('content')
<div class="container py-5">
    <h2>Kelola Laporan</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporan as $l)
                <tr>
                    <td>{{ $l['judul'] }}</td>
                    <td>{{ $l['tanggal'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">Belum ada laporan</td>
                 </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
