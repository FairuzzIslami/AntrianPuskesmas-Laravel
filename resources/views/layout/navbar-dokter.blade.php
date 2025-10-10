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
            --primary-color: #66bb6a;
            /* hijau segar */
            --primary-dark: #43a047;
            /* hijau stabil */
            --primary-light: #a5d6a7;
            /* hijau muda lembut */
            --accent-color: #c8e6c9;
            /* hijau pucat (aksen) */
            --secondary-color: #81c784;
            /* hijau pastel */
            --gradient-start: #81c784;
            /* gradasi terang */
            --gradient-end: #43a047;
            /* hijau medium */
            --text-light: #f9fff9;
            --hover-glow: rgba(129, 199, 132, 0.4);
        }

        /* NAVBAR */
        .navbar-custom {
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 0.6rem 0;
            border-bottom: 2px solid rgba(255, 255, 255, 0.15);
        }

        .navbar-brand-custom {
            font-weight: 700;
            font-size: 1.3rem;
            color: #ffffff !important;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
        }

        .nav-link-custom {
            color: #f1f8e9 !important;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .nav-link-custom:hover {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--secondary-color) 100%);
            color: #1b5e20 !important;
            box-shadow: 0 4px 12px var(--hover-glow);
        }

        .nav-link-custom.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            border: 1px solid rgba(255, 255, 255, 0.4);
            color: #ffffff !important;
            box-shadow: 0 3px 8px rgba(76, 175, 80, 0.3);
        }

        .nav-icon {
            margin-right: 6px;
        }

        /* USER INFO */
        .user-info {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.25);
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            color: #1b5e20;
        }

        .user-info strong,
        .user-info .fw-bold {
            color: #fff !important;
        }

        .user-info small {
            font-size: 0.75rem;
            color: #e8f5e9;
        }

        .user-icon {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            color: #fff;
            background: linear-gradient(135deg, var(--primary-light), var(--primary-color));
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.3);
        }

        /* LOGOUT */
        .logout-btn {
            background: rgba(244, 67, 54, 0.15);
            border: 1px solid rgba(244, 67, 54, 0.3);
            color: #fff !important;
            border-radius: 8px;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: rgba(244, 67, 54, 0.3);
            box-shadow: 0 0 10px rgba(244, 67, 54, 0.5);
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom" href="{{ route('dokter.dashboard') }}">
                MedCare Doctor
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('dokter.dashboard') ? 'active' : '' }}"
                            href="{{ route('dokter.dashboard') }}">
                            <span class="nav-icon"><i class="fas fa-home"></i></span> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('dokter.daftar-pasien') ? 'active' : '' }}"
                            href="{{ route('dokter.daftar-pasien') }}">
                            <span class="nav-icon"><i class="fas fa-users"></i></span> Daftar Pasien
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('dokter.pemanggilan') ? 'active' : '' }}"
                            href="{{ route('dokter.pemanggilan') }}">
                            <span class="nav-icon"><i class="fas fa-bullhorn"></i></span> Pemanggilan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('dokter.laporan') ? 'active' : '' }}"
                            href="{{ route('dokter.laporan') }}">
                            <span class="nav-icon"><i class="fas fa-file-medical"></i></span> Laporan
                        </a>
                    </li>


                </ul>

                <div class="d-flex align-items-center ms-lg-3">
                    <div class="user-info">
                        <div class="user-icon">
                            <i class="fas fa-user-md text-white"></i>
                        </div>
                        <div>
                            <div class="fw-bold small">dr. {{ Auth::user()->name ?? 'Dokter' }}</div>
                        </div>
                    </div>

                    <a class="nav-link nav-link-custom logout-btn ms-2" href="{{ route('logout') }}"
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
