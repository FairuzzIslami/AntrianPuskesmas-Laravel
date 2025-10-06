<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        .navbar {
            background: linear-gradient(90deg, #198754, #20c997);
            /* hijau tua → hijau toska */
        }

        .navbar-brand {
            font-weight: bold;
        }

        .nav-link {
            color: #fff !important;
        }

        .nav-link:hover {
            color: #d1e7dd !important;
            /* hijau muda pas hover */
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
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-hospital"></i> Puskesmas Admin
            </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
            </button>

            <div class="collapse navbar-collapse justify-content-center justify-content-lg-end" id="navbarAdmin">
                <ul class="navbar-nav text-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                                class="bi bi-speedometer2"></i> Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.dokter') }}"><i
                                class="bi bi-person-badge"></i> Kelola Dokter</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan') }}"><i
                                class="bi bi-file-earmark-text"></i> Kelola Laporan</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light ms-2">
                                <i class="bi bi-box-arrow-right"></i> Logout
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
