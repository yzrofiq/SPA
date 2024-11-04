<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Additional CSS -->
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar a {
            color: #333;
            font-weight: 500;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #e9ecef;
            color: #007bff;
        }
        .navbar-brand {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex">
            <div class="sidebar">
                <h4 class="text-center">Dashboard</h4>
                <a href="{{ url('/home') }}">Home</a>
                <a href="{{ route('pelanggans.index') }}">Pelanggan</a>
                <a href="{{ route('tagihans.index') }}">Tagihan</a>
                <a href="{{ route('pembayarans.index') }}">Pembayaran</a>
            </div>

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>
</body>
<style>
    /* Sidebar styling */
    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        background-color: #007bff; /* Warna biru muda */
        padding-top: 20px;
        color: #ffffff;
    }

    .sidebar h4 {
        font-weight: bold;
        color: #ffffff;
    }

    .sidebar a {
        color: #ffffff;
        font-weight: 500;
        display: block;
        padding: 10px 20px;
        text-decoration: none;
        transition: background-color 0.2s, color 0.2s;
    }

    .sidebar a:hover {
        background-color: #0056b3; /* Biru lebih gelap */
        color: #cfe2ff; /* Biru muda lembut */
    }

    /* Content area */
    .content {
        margin-left: 250px;
        padding: 20px;
        background-color: #f1f5f9; /* Background abu-abu terang */
        min-height: 100vh;
    }

    /* Navbar */
    .navbar {
        background-color: #f8f9fa; /* Background abu-abu terang */
        border-bottom: 1px solid #dbe2e8;
    }

    .navbar-brand {
        font-weight: bold;
        color: #007bff; /* Warna biru yang sesuai dengan tema */
    }

    .navbar-nav .nav-link {
        color: #333;
        transition: color 0.2s;
    }

    .navbar-nav .nav-link:hover {
        color: #007bff; /* Warna biru saat hover */
    }

    /* Button styling */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #ffffff;
        transition: background-color 0.2s, border-color 0.2s;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Biru lebih gelap */
        border-color: #0056b3;
    }

    /* Headings and text */
    h1, h2, h3, h4, h5, h6 {
        color: #0056b3; /* Biru lebih gelap */
    }

    p, li, span {
        color: #333;
        line-height: 1.6;
    }

    /* Table styling */
    table {
        width: 100%;
        background-color: #ffffff;
        border-collapse: collapse;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.05);
    }

    table th, table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #dbe2e8;
    }

    table th {
        background-color: #e9ecef;
        font-weight: bold;
    }

    table tr:hover {
        background-color: #f1f5f9;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .content {
            margin-left: 0;
        }
    }
</style>

</html>
