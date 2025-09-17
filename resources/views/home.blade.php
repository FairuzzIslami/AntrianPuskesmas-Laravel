<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    .navbar-nav .nav-link {
        transition: color .2s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #1b5e20;
    }

    .navbar-nav .btn-warning {
        transition: background-color .2s ease, color .2s ease;
    }

    .navbar-nav .btn-warning:hover {
        background-color: #e6a50e;
        color: #fff;
    }
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <!-- Logo di kiri -->
            <a class="navbar-brand fw-bold text-success" href="#">
                <img src="{{ asset('asset/img/logo.jpg') }}" alt="Logo" width="30" class="me-2">
                Puskesmas Digital
            </a>

            <!-- Tombol toggle untuk mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu navigasi -->
            <div class="collapse navbar-collapse justify-content-lg-end" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ url('/tentang') }}">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#fitur">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#kontak">Kontak</a>
                    </li>
                    <li>
                        <a href="" class="btn btn-warning fw-bold text-white">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>
