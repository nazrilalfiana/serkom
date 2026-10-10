<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/madrasah.jpg') }}">
    <title>@yield('title', 'Sistem Informasi Sekolah')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <style>
        html { scroll-behavior: smooth;}
        section[id] { scroll-margin-top: 80px; }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-md bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-1 text-decoration-none text-success" href="{{ route('landing') }}">
                <img src="{{ asset('assets/images/madrasah.jpg') }}" alt="logo" width="50" height="50">
                <span>MI LEUWISEENG</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuNav">
                <ul class="navbar-nav ms-auto align-items-md-center gap-md-2">
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#profil">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#guru">Guru</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#berita">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}#galeri">Galeri</a></li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a></li>
                        @else
                            <li class="nav-item"><a class="btn btn-outline-success" href="{{ route('login') }}">Masuk</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        @yield('content')
    </main>

    <footer id="kontak" class="bg-dark text-light pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-5">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ asset('assets/images/madrasah.jpg') }}" alt="logo" width="40" height="40" class="rounded">
                        <span class="fw-bold fs-5">MI LEUWISEENG</span>
                    </div>
                    <p class="text-secondary">
                        Sistem informasi sekolah untuk mengelola data siswa, guru,
                        dan kegiatan ekstrakulikuler dalam satu tempat
                    </p>
                </div>
                <div class="col-6 col-md-3">
                    <h6 class="fw-bold">Menu</h6>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('landing') }}#profil" class="link-secondary text-decoration-none">Profil</a></li>
                        <li><a href="{{ route('landing') }}#guru" class="link-secondary text-decoration-none">Guru</a></li>
                        <li><a href="{{ route('landing') }}#berita" class="link-secondary text-decoration-none">Berita</a></li>
                        <li><a href="{{ route('landing') }}#galeri" class="link-secondary text-decoration-none">Galeri</a></li>
                        @guest
                            <li><a href="{{ route('login') }}" class="link-secondary text-decoration-none">Masuk</a></li>
                        @endguest
                    </ul>
                </div>
                <div class="col-6 col-md-4">
                    <h6 class="fw-bold">Kontak</h6>
                    <ul class="list-unstyled text-secondary mb-0">
                        <li class="d-flex gap-2 mb-2">
                            <i class="fa-solid fa-location-dot mt-1"></i>
                            <span>Kp. Leuwiseeng, Des. Sukaherang, Kec. Singaparna, Kab. Tasikmalaya</span>
                        </li>
                        <li class="d-flex gap-2 mb-2">
                            <i class="fa-solid fa-phone mt-1"></i>
                            <span>085951625844</span>
                        </li>
                        <li class="d-flex gap-2">
                            <i class="fa-solid fa-envelope mt-1"></i>
                            <span>mileuwiseeng@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center text-secondary small">
                &copy; {{ date('Y') }} MI LEUWISEENG. Hak cipta di lindungi.
            </div>
        </div>
    </footer>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>