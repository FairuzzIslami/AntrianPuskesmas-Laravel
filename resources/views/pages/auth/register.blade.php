@extends('layout.guest')

@section('content')
    <div class="container login-container d-flex align-items-center justify-content-center py-5">
        <div class="row w-100 shadow-lg rounded-4 overflow-hidden" style="max-width: 850px;">

            <!-- Bagian kiri -->
            <div class="col-md-6 left-card text-center">
                <img src="{{ asset('asset/img/logo.jpg') }}" alt="Logo Puskesmas">
                <h2 class="fw-bold">Puskesmas</h2>
                <p>Layanan kesehatan cepat, aman, dan terpercaya</p>
            </div>

            <!-- Bagian kanan (Form Register) -->
            <div class="col-md-6 right-card">
                <div class="text-center">
                    <h3 class="mb-2 fw-bold">Registrasi Pasien</h3>
                    <p class="text-muted small">Isi data di bawah untuk membuat akun pasien baru.</p>
                </div>

                <!-- 🔥 Form Registrasi -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <label for="name" class="input-group-text">
                                <i class="fa-solid fa-user"></i>
                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                        </div>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <label for="email" class="input-group-text">
                                <i class="fa-solid fa-envelope"></i>
                            </label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email') }}" placeholder="Masukkan email" required>
                        </div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <label class="input-group-text" for="password">
                                <i class="fa-solid fa-lock"></i>
                            </label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Masukkan password" required>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <div class="input-group">
                            <label class="input-group-text" for="password_confirmation">
                                <i class="fa-solid fa-lock"></i>
                            </label>
                            <input type="password" class="form-control" id="password_confirmation"
                                   name="password_confirmation" placeholder="Ulangi password" required>
                        </div>
                    </div>

                    <!-- Tombol Register -->
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-login1">Register</button>
                    </div>

                    <p class="text-center">Sudah punya akun? <a href="{{ route('login.form') }}">Login</a></p>
                </form>
            </div>
        </div>
    </div>

    <style>
        body { background-color: #f4f4f4; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .login-container { min-height: 100vh; margin-top: 65px; }
        .left-card { background: linear-gradient(135deg, var(--biru) 0%, var(--hijau) 100%); color: #fff; display: flex;
            flex-direction: column; justify-content: center; align-items: center; padding: 2rem;
            border-radius: 1rem 0 0 1rem; animation: fadeInLeft 1s ease-in-out; }
        .left-card img { max-width: 120px; margin-bottom: 1rem; }
        .right-card { background: #fff; border-radius: 0 1rem 1rem 0; padding: 2.5rem; animation: fadeInRight 1s ease-in-out; }
        .form-control:focus { border-color: #2C9AB7; box-shadow: 0 0 0 0.2rem rgba(44, 154, 183, 0.25); }
        .btn-login1 { background: linear-gradient(135deg, var(--biru) 0%, var(--hijau) 100%); color: #fff; font-weight: 600; transition: 0.3s; }
        .btn-login1:hover { background: #1B6E8C; color: #fff; }
        .input-group-text { background: #fff; border-right: 0; }
        .input-group .form-control { border-left: 0; }
        a { color: #2C9AB7; }
        @media (max-width: 768px) { .left-card { display: none; } .right-card { border-radius: 1rem; } }
        @keyframes fadeInLeft { from { opacity: 0; transform: translateX(-50px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes fadeInRight { from { opacity: 0; transform: translateX(50px); } to { opacity: 1; transform: translateX(0); } }
    </style>
@endsection
