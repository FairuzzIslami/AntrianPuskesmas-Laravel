<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasien - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-nav .nav-item { margin-right: 0.5rem; }
        .footer { margin-top: auto; }
        html, body { height: 100%; }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        main { flex: 1; }
    </style>
</head>
<body>
    <!-- Navbar khusus pasien -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('pasien.beranda') }}">
                Sistem Antrian Puskesmas
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarPasien" aria-controls="navbarPasien" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarPasien">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="{{ route('pasien.beranda') }}" 
                           class="nav-link px-3 {{ Request::routeIs('pasien.beranda') ? 'active' : '' }}">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pasien.pemanggilan') }}" 
                           class="nav-link px-3 {{ Request::routeIs('pasien.pemanggilan') ? 'active' : '' }}">
                            <i class="fas fa-bell me-1"></i>Pemanggilan
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm ms-2">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <main class="container-lg my-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light text-center py-4 mt-5 border-top footer">
        <div class="container">
            <p class="mb-0 text-muted">
                &copy; {{ date('Y') }} Sistem Antrian Puskesmas | Hak Cipta Dilindungi
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
