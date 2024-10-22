<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="{{ config('app.name') }}">
    <meta name="author" content="Themesberg">
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


    <link type="text/css" href="{{ url('/') }}/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link type="text/css" href="{{ url('/') }}/vendor/notyf/notyf.min.css" rel="stylesheet">
    <link type="text/css" href="{{ url('/') }}/css/volt.css" rel="stylesheet">

</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->


    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <a class="navbar-brand me-lg-5" href="/home">
            <img class="navbar-brand-dark" src="{{ url('/') }}/assets/img/favicon/favicon-32x32.png" alt="Simpatik" style="background-color: #f8f9fa; padding: 2px; border-radius: 2px;" /> <img class="navbar-brand-light" src="{{ url('/') }}/assets/img/favicon/favicon-32x32.png" alt="Simpatik" style="background-color: #f8f9fa; padding: 2px; border-radius: 2px;"/>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="d-flex align-items-center">
                    <div class="avatar-lg me-4">
                        <img src="{{ url('/') }}/assets/img/favicon/favicon-32x32.png" class="card-img-top rounded-circle border-white" alt="Simpatik" style="background-color: #f8f9fa; padding: 2px; border-radius: 2px;">
                    </div>
                    <div class="d-block">
                        <h2 class="h5 mb-3">Hi,
                            {{ Auth::check() ? Auth::user()->name : '' }}
                        </h2>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                                <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">
                <li class="nav-item">
                    <a href="/home" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon" style="background-color: #f8f9fa; padding: 5px; border-radius: 5px;">
                            <img src="{{ url('/') }}/assets/img/favicon/favicon-32x32.png" height="20" width="20" alt="Simpatik">
                        </span>
                        <span class="mt-1 ms-1 sidebar-text">SIMPATIK</span>
                    </a>
                </li>
                <li class="nav-item  @if (request()->is('home')) active @endif">
                    <a href="/home" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item @if (request()->is('fakultas')) active @endif">
                    <a href="/fakultas" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Fakultas</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item @if (request()->is('prodi')) active @endif">
                    <a href="/prodi" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Program Studi</span>
                        </span>
                    </a>
                </li>

                <li class="nav-item @if (request()->is('periode-wisuda')) active @endif">
                    <a href="/periode-wisuda" class="nav-link">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path>
                                <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Periode Wisuda</span>
                    </a>
                </li>
                <li class="nav-item @if (request()->is('alumni')) active @endif">
                    <a href="/alumni" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Alumni</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between align-items-center" href="#kuisionerSubmenu" data-bs-toggle="collapse" aria-expanded="false">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Kuisioner</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </a>
                    <div class="collapse" id="kuisionerSubmenu">
                        <ul class="nav flex-column ">
                            <li class="nav-item">
                                <a class="nav-link" href="/kuisioner/belum-bekerja">
                                    <span class="sidebar-text " style="margin-left:40px">
                                        <svg class="icon icon-xs me-2" fill="#FFFFFFFF" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 333.917 333.917" xml:space="preserve">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M7.999,311.628c-1.001,0-2.02-0.189-3.005-0.589c-4.094-1.661-6.066-6.327-4.405-10.421l21.742-53.585 c9.604-23.664,26.818-55.123,65.278-55.123h28.839c20.719,0,37.777,9.221,50.7,27.406c0.205,0.287,1.188,1.627,2.387,3.26 c4.125,5.62,5.283,7.213,5.635,7.744c2.442,3.683,1.436,8.647-2.247,11.089c-3.667,2.431-8.609,1.442-11.06-2.204 c-0.444-0.644-3.554-4.882-5.228-7.163c-1.279-1.742-2.326-3.17-2.531-3.459c-6.246-8.789-13.247-14.652-21.428-17.823 l-24.188,33.143c-1.506,2.063-3.907,3.284-6.462,3.284s-4.956-1.221-6.462-3.284L71.38,210.76 c-14.028,5.446-24.739,18.919-34.224,42.29l-21.741,53.584C14.154,309.742,11.16,311.628,7.999,311.628z M89.108,207.91 l12.92,17.705l12.921-17.705H89.108z M325.917,311.624H44.534c-4.418,0-8-3.582-8-8s3.582-8,8-8h281.383c4.418,0,8,3.582,8,8 S330.336,311.624,325.917,311.624z M310.926,277.816h-61.633c-4.418,0-8-3.582-8-8s3.582-8,8-8h61.633 c3.855,0,6.992-3.137,6.992-6.991c0-3.856-3.136-6.993-6.992-6.993h-61.633c-4.418,0-8-3.582-8-8s3.582-8,8-8h61.633 c12.678,0,22.992,10.313,22.992,22.991C333.917,267.502,323.603,277.816,310.926,277.816z M160.615,276.097 c-0.005,0-0.009,0-0.014,0c-1.003,0-2.015-0.188-2.982-0.579c-0.462-0.186-0.909-0.415-1.332-0.687 c-7.954-4.777-22.282-9.522-27.436-2.152c-2.531,3.623-7.52,4.505-11.14,1.974c-3.621-2.531-4.505-7.519-1.973-11.141 c9.895-14.156,29.344-12.447,44.87-4.565c15.525-7.883,34.973-9.593,44.869,4.566c2.531,3.621,1.647,8.609-1.974,11.141 c-3.62,2.53-8.609,1.648-11.14-1.975c-5.154-7.373-19.484-2.624-27.436,2.154c-0.417,0.267-0.858,0.494-1.314,0.678 C162.641,275.906,161.623,276.097,160.615,276.097z M102.029,177.708c-23.976,0-43.482-19.507-43.482-43.483 c0-19.743,13.226-36.456,31.282-41.742c0.094-0.031,0.189-0.06,0.285-0.087c1.956-0.556,3.948-0.973,5.963-1.249 c1.885-0.26,3.806-0.397,5.759-0.406c0.031,0,0.062,0,0.094,0c0.016-0.001,0.028,0,0.044,0c0.018-0.001,0.035-0.001,0.054,0 c0.012,0,0.028-0.001,0.04,0c0.011,0,0.022-0.001,0.033,0c21.941,0.036,40.185,16.137,43.03,37.716 c0.251,1.888,0.381,3.813,0.381,5.769C145.512,158.201,126.006,177.708,102.029,177.708z M86.709,111.417 c-7.332,4.94-12.163,13.32-12.163,22.808c0,15.154,12.329,27.483,27.482,27.483c13.166,0,24.199-9.306,26.869-21.685 c-0.43,0.013-0.859,0.019-1.29,0.019C108.848,140.042,92.78,128.296,86.709,111.417z M102.053,106.74 c4.037,10.228,13.96,17.281,25.504,17.302c-4.043-10.102-13.917-17.263-25.436-17.302c-0.013,0.002-0.027,0-0.042,0 C102.072,106.741,102.062,106.741,102.053,106.74z M175.137,158.091c-1.398,0-2.796-0.366-4.044-1.098 c-2.451-1.436-3.956-4.062-3.956-6.902V53.594c0-17.262,14.043-31.305,31.306-31.305h104.169c17.262,0,31.305,14.043,31.305,31.305 v55.992c0,17.262-14.043,31.305-31.305,31.305h-94.696l-28.867,16.179C177.833,157.751,176.485,158.091,175.137,158.091z M198.443,38.289c-8.439,0-15.306,6.865-15.306,15.305v82.843l18.778-10.524c1.195-0.67,2.542-1.021,3.911-1.021h96.785 c8.439,0,15.305-6.865,15.305-15.305V53.594c0-8.439-6.866-15.305-15.305-15.305H198.443z M278.833,105.679h-63.968 c-4.418,0-8-3.582-8-8s3.582-8,8-8h63.968c4.418,0,8,3.582,8,8S283.252,105.679,278.833,105.679z M259.071,73.5h-44.206 c-4.418,0-8-3.582-8-8s3.582-8,8-8h44.206c4.418,0,8,3.582,8,8S263.489,73.5,259.071,73.5z"></path>
                                            </g>
                                        </svg>
                                        Belum Bekerja</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kuisioner/sudah-bekerja">
                                    <span class="sidebar-text" style="margin-left:40px">
                                        <svg class="icon icon-xs me-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M22 14C22 10.2288 22 8.34315 20.8284 7.17157C20.0781 6.42122 19.0348 6.15144 17.3909 6.05445C16.468 6 15.3559 6 14 6H10C8.64413 6 7.53199 6 6.60915 6.05445C4.96519 6.15144 3.92193 6.42122 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C21.4816 20.1752 21.7706 19.3001 21.8985 18" stroke="#FFFFFFFF" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M6.60938 6.05445C7.43282 6.03358 8.15925 5.45491 8.43944 4.68032C8.44806 4.65649 8.4569 4.62999 8.47457 4.57697L8.50023 4.5C8.54241 4.37344 8.56351 4.31014 8.58608 4.254C8.87427 3.53712 9.54961 3.05037 10.3208 3.00366C10.3812 3 10.4479 3 10.5814 3H13.4191C13.5525 3 13.6192 3 13.6796 3.00366C14.4508 3.05037 15.1262 3.53712 15.4144 4.254C15.4369 4.31014 15.458 4.37343 15.5002 4.5L15.5259 4.57697C15.5435 4.62992 15.5524 4.65651 15.561 4.68032C15.8412 5.45491 16.5676 6.03358 17.3911 6.05445" stroke="#FFFFFFFF" stroke-width="1.5"></path>
                                                <path d="M21.6618 8.71973C18.6519 10.6761 17.147 11.6543 15.5605 12.1472C13.2416 12.8677 10.7586 12.8677 8.43963 12.1472C6.85313 11.6543 5.34822 10.6761 2.33838 8.71973" stroke="#FFFFFFFF" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M8 11V13" stroke="#FFFFFFFF" stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M16 11V13" stroke="#FFFFFFFF" stroke-width="1.5" stroke-linecap="round"></path>
                                            </g>
                                        </svg>
                                        Sudah Bekerja</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/kuisioner/study-lanjut">
                                    <span class="sidebar-text" style="margin-left:40px">

                                        <svg class="icon icon-xs me-2" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M8 11L14 8V14H16V5L8 1L0 5V7L8 11Z" fill="#FFFFFFFF"></path>
                                                <path d="M2 10.2361V13L8 16L12 14V11.2361L8 13.2361L2 10.2361Z" fill="#FFFFFFFF"></path>
                                            </g>
                                        </svg>
                                        Study Lanjut</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/laporan-grafik" class="nav-link d-flex justify-content-between">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Laporan & Grafik</span>
                        </span>
                    </a>
                </li>
                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                <li class="nav-item @if (request()->is('admin/manajemen-user')) active @endif">
                    <a href="/admin/manajemen-user" class="nav-link d-flex align-items-center">
                        <span class="sidebar-icon">
                            <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-14a3 3 0 11-2 5.5 3 3 0 012-5.5zm3 12a5 5 0 00-8 0h8z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <span class="sidebar-text">Manajemen User </span>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center btn-upgrade-pro">
                            <span>Log out</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
                    <div class="d-flex align-items-center">
                        <!-- Search form -->
                        <form class="navbar-search form-inline" id="navbar-search-main">
                            <div class="input-group input-group-merge search-bar">
                                <span class="input-group-text" id="topbar-addon">
                                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
                            </div>
                        </form>
                        <!-- / Search form -->
                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="media d-flex align-items-center">
                                    <img class="avatar rounded-circle" alt="Image placeholder" src="{{ url('/') }}/assets/img/favicon/favicon-32x32.png" style="background-color: #f8f9fa; padding: 2px; border-radius: 2px;">
                                    <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                                        <span class="mb-0 font-small fw-bold text-gray-900">{{ Auth::check() ? Auth::user()->name : '' }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                                <a class="dropdown-item d-flex align-items-center" href="/profil">
                                    <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                                    </svg>
                                    My Profile
                                </a>
                                <div role="separator" class="dropdown-divider my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item d-flex align-items-center" type="submit">
                                        <svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lg-start">© <span class="current-year"></span> <a class="text-primary fw-normal" href="#" target="_blank">{{ config('app.name') }}</a></p>
                </div>
                <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">
                </div>
            </div>
        </footer>
    </main>

    <script src="{{ url('/') }}/vendor/@popperjs/core/dist/umd/popper.min.js"></script>
    <script src="{{ url('/') }}/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="{{ url('/') }}/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="{{ url('/') }}/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="{{ url('/') }}/vendor/chartist/dist/chartist.min.js"></script>
    <script src="{{ url('/') }}/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="{{ url('/') }}/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="{{ url('/') }}/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ url('/') }}/vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>
    <script src="{{ url('/') }}/vendor/notyf/notyf.min.js"></script>
    <script src="{{ url('/') }}/vendor/simplebar/dist/simplebar.min.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ url('/') }}/assets/js/volt.js"></script>


</body>

</html>
