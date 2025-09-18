<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --hijau: #2ecc71;
            --hijau-gelap: #27ae60;
            --biru: #3498db;
            --biru-gelap: #2980b9;
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            color: var(--biru) !important;
            font-weight: 700;
        }

        .nav-link {
            color: #555 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--biru) !important;
        }

        .active-nav {
            color: var(--biru) !important;
            font-weight: 600;
        }

        .logo-placeholder {
            display: inline-block;
            width: 30px;
            height: 30px;
            background-color: #000;
            border-radius: 50%;
            margin-right: 10px;
        }
        .btn-login {
            background-color: #2ecc71 !important;
            /* hijau terang sama seperti di Home */
            border-color: #2ecc71 !important;
            color: #fff !important;
        }

        .btn-login:hover {
            background-color: #27ae60 !important;
            /* hijau sedikit gelap saat hover */
            border-color: #27ae60 !important;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <img src="{{ asset('asset/img/logo.jpg') }}" alt="Logo" width="30" class="me-2">
                Puskesmas Digital
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active active-nav' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('tentang') ? 'active active-nav' : '' }}"
                            href="/tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('fitur') ? 'active active-nav' : '' }}"
                            href="/fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('kontak') ? 'active active-nav' : '' }}"
                            href="/kontak">Kontak</a>
                    </li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0">
                    <a href="/login" class="btn btn-login">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navLinks = document.querySelectorAll('.nav-link');
            const navbarCollapse = document.querySelector('.navbar-collapse');
            const navbarToggler = document.querySelector('.navbar-toggler');

            // Tutup menu setelah klik link
            navLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    let bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                });
            });

            // Toggle manual ketika klik garis tiga
            navbarToggler.addEventListener('click', function() {
                let bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                    toggle: false
                });

                if (navbarCollapse.classList.contains('show')) {
                    bsCollapse.hide();
                } else {
                    bsCollapse.show();
                }
            });
        });
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
