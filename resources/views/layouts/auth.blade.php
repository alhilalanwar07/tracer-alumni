<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>{{ $title ?? null }} | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="author" content="FTI USN KOLAKA">
    <meta name="description" content="{{ config('app.name') }}">
    <meta name="keywords" content="simpatik, fti, usn, kolaka" />
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

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('/') }}/assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/') }}/assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ url('/') }}/assets/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="{{ url('/') }}/assets/img/favicon/safari-pinned-tab.svg" color="#803D07FF">
    <meta name="msapplication-TileColor" content="#803D07FF">
    <meta name="theme-color" content="#803D07FF">

    <link href="{{ asset('styles_login.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Sweet Alert -->
    <link type="text/css" href="{{ url('/') }}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">

    @livewireStyles()
</head>

<body>
    {{ $slot }}
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>
    <script src="scripts_login.js"></script>
    <!-- Sweet Alerts 2 -->
    <script src="{{ url('/') }}/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    @livewireScripts()
</body>

</html>
