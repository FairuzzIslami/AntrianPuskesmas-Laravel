<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .navbar {
            background: linear-gradient(90deg, #157347, #20c997);
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: #d1e7dd;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .navbar-brand span {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .navbar.shadow-sm {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        footer {
            background: #198754;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center text-white" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-hospital me-2 fs-4"></i>
                <span>Puskesmas Admin</span>
            </a>

            <!-- Tombol toggle -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-list text-white fs-3"></i>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="navbarAdmin">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item mx-1">
                        <a class="nav-link text-white {{ Request::is('admin/dashboard') ? 'fw-bold' : '' }}"
                            href="{{ route('admin.dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-white {{ Request::is('admin/dokter') ? 'fw-bold' : '' }}"
                            href="{{ route('admin.dokter') }}">
                            Dokter
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link text-white {{ Request::is('admin/laporan') ? 'fw-bold' : '' }}"
                            href="{{ route('admin.laporan') }}">
                            Laporan
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center ms-lg-3">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm d-flex align-items-center">
                                <i class="bi bi-box-arrow-right me-1"></i> Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    {{-- Konten halaman --}}
    <main class="container py-4">
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Puskesmas Digital - Admin Panel</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
