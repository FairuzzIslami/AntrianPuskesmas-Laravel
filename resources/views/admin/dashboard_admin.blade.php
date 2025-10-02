@extends('layout.admin')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-5">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, {{ auth()->user()->name }}!</p>
    <ul>
        <li><a href="{{ route('admin.dokter') }}">Kelola Dokter</a></li>
        <li><a href="{{ route('admin.laporan') }}">Kelola Laporan</a></li>
    </ul>
</div>
@endsection
