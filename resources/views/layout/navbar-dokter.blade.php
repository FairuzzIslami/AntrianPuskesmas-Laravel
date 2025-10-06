<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2e7d32;
            --primary-dark: #1b5e20;
            --primary-light: #4caf50;
            --accent-color: #81c784;
            --text-light: #f1f8e9;
        }
        
        .navbar-custom {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 0;
        }
        
        .navbar-brand-custom {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
        }
        
        .navbar-brand-custom::before {
            content: "⚕️";
            margin-right: 10px;
            font-size: 1.8rem;
        }
        
        .nav-link-custom {
            color: var(--text-light) !important;
            font-weight: 500;
            padding: 0.7rem 1.2rem !important;
            margin: 0 0.2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .nav-link-custom:hover, .nav-link-custom:focus {
            background-color: rgba(255, 255, 255, 0.15);
            color: white !important;
            transform: translateY(-2px);
        }
        
        .nav-link-custom.active {
            background-color: var(--primary-light);
            color: white !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
        
        .nav-icon {
            margin-right: 8px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }
        
        .navbar-toggler {
            border: none;
            padding: 0.4rem 0.6rem;
        }
        
        .navbar-toggler:focus {
            box-shadow: none;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        .user-info {
            color: var(--text-light);
            margin-right: 15px;
            display: flex;
            align-items: center;
        }
        
        .user-icon {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            width: 35px;
            height: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }
        
        @media (max-width: 991px) {
            .navbar-collapse {
                margin-top: 1rem;
                padding: 1rem;
                background-color: var(--primary-dark);
                border-radius: 10px;
            }
            
            .nav-link-custom {
                margin: 0.2rem 0;
            }
            
            .user-info {
                margin: 10px 0;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom" href="{{ route('dokter.dashboard') }}">
                Dashboard Dokter
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}" href="{{ route('dokter.dashboard') }}">
                            <span class="nav-icon"><i class="fas fa-home"></i></span> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('dokter.daftar-pasien') ? 'active' : '' }}" href="{{ route('dokter.daftar-pasien') }}">
                            <span class="nav-icon"><i class="fas fa-list"></i></span> Daftar Pasien
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('dokter.pemanggilan') ? 'active' : '' }}" href="{{ route('dokter.pemanggilan') }}">
                            <span class="nav-icon"><i class="fas fa-bell"></i></span> Pemanggilan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('dokter.catatan-medis*') ? 'active' : '' }}" href="{{ route('dokter.catatan-medis') }}">
                            <span class="nav-icon"><i class="fas fa-notes-medical"></i></span> Catatan Medis
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex align-items-center ms-lg-3">
            
                    <a class="nav-link nav-link-custom" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="nav-icon"><i class="fas fa-sign-out-alt"></i></span> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Dinamis -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>