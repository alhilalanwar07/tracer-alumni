<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="author" content="FTI USN KOLAKA">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="sistem, informasi, tracer, alumni, fti usn kolaka" />
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="{{ config('app.name') }}">
    <meta property="og:image" content="{{ url('/') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="{{ config('app.name') }}">
    <meta property="twitter:description" content="{{ config('app.name') }}">
    <meta property="twitter:image" content="{{ url('/') }}">

    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('/') }}/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ url('/') }}/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="{{ url('/') }}/assets/img/favicon/safari-pinned-tab.svg" color="#803D07FF">
    <meta name="msapplication-TileColor" content="#803D07FF">
    <meta name="theme-color" content="#803D07FF">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    {{-- icon font awasome free --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ url('/') }}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- style_alumni-->
    <link rel="stylesheet" href="{{ url('/') }}/style_alumni.css">

    @livewireStyles()
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light  fixed-top shadow-sm animate__animated animate__fadeInDown mb-4" style="background-color: #fffaf0;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ url('/') }}/assets/img/favicon/apple-touch-icon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                SIMPATIK
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @auth

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ url('/') }}/assets/img/favicon/favicon-16x16.png" alt="Profile" width="30" height="30" class="rounded-circle">
                            {{ Auth::check() ? Auth::user()->name : 'User' }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="/alumni/profil">Profile</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                @endauth
                @guest
                <ul class="navbar-nav ms-3 ms-auto">
                    <li class="nav-item d-flex">
                        <a class="btn btn-sm btn-custom text-white fw-bold px-4 " href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> &nbsp;
                            Login</a>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container my-5" style="margin-top: 100px !important;">
        {{ $slot }}
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 animate__animated animate__fadeInUp" style="position: fixed; bottom: 0; width: 100%">
        <div class="container">
            <span>&copy; {{ date('Y') }} SIMPATIK. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vendor JS -->
    <script src="{{ url('/') }}/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <!-- Smooth scroll -->
    <script src="{{ url('/') }}/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="{{ url('/') }}/vendor/chartist/dist/chartist.min.js"></script>
    <script src="{{ url('/') }}/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="{{ url('/') }}/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="{{ url('/') }}/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    @livewireScripts()

</body>

</html>
