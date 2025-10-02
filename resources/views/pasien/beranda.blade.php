@extends('layout.layout')

@section('title', 'Halaman Pasien')

@section('content')
@auth
  @php $user = auth()->user(); @endphp
  <div class="container py-5">
    <div class="card shadow-lg rounded-4">
      <div class="card-body">
        <h3 class="fw-bold">Selamat Datang, {{ $user->name ?? $user->email }}</h3>
        <p class="text-muted">Anda login sebagai <span class="badge bg-success">Pasien</span>.</p>
        ...
      </div>
    </div>
  </div>
@else
  <div class="container py-5">
    <div class="alert alert-warning">Silakan login untuk mengakses halaman pasien.</div>
  </div>
@endauth
@endsection
