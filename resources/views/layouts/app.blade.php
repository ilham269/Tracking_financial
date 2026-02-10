<!DOCTYPE html>
<html lang="en"
      class="dark-style layout-menu-fixed"
      dir="ltr"
      data-theme="theme-default"
      data-assets-path="{{ asset('assets') }}/"
      data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    {{-- Core CSS (Bootstrap Template) --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}">

    {{-- ===== CUSTOM DARK MONOCHROME ===== --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        /* ===== SIDEBAR ===== */
        .bg-menu-theme {
            background-color: #0f0f0f !important;
        }

        .app-brand {
            border-bottom: 1px solid #1f1f1f;
        }

        .app-brand-text {
            color: #ffffff !important;
            letter-spacing: .5px;
        }

        .menu-header-text {
            color: #9ca3af !important;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .menu-link {
            color: #e5e7eb !important;
            border-radius: 8px;
            margin: 4px 12px;
            transition: .2s ease;
        }

        .menu-link:hover {
            background-color: #1f1f1f !important;
            color: #ffffff !important;
        }

        .menu-icon {
            color: #d1d5db !important;
            font-size: 1.2rem;
        }

        .menu-item.active > .menu-link {
            background-color: #ffffff !important;
            color: #0f0f0f !important;
            font-weight: 600;
        }

        .menu-item.active .menu-icon {
            color: #0f0f0f !important;
        }

        /* ===== NAVBAR ===== */
        .layout-navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e5e7eb;
        }

        .layout-navbar .nav-link {
            color: #111827 !important;
        }

        /* ===== CONTENT ===== */
        .content-wrapper {
            background-color: #f9fafb;
        }

        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }
    </style>

    @stack('css')
</head>

<body>

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        {{-- SIDEBAR --}}
        <aside id="layout-menu" class="layout-menu menu-vertical bg-menu-theme shadow-sm">

            <div class="app-brand px-4 py-3">
                <a href="{{ route('home') }}" class="d-flex align-items-center gap-2">
                    <span class="fs-4 text-white">⬤</span>
                    <span class="app-brand-text fw-bold fs-5">Financial Tracking</span>
                </a>
            </div>

            <ul class="menu-inner py-3">

                <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="menu-link">
                        <i class="menu-icon bx bx-grid-alt"></i>
                        <div>Home</div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase mt-3">
                    <span class="menu-header-text">Keuangan</span>
                </li>

                <li class="menu-item {{ request()->is('saldo*') ? 'active' : '' }}">
                    <a href="{{ route('saldo.index') }}" class="menu-link">
                        <i class="menu-icon bx bx-credit-card"></i>
                        <div>Saldo / E-Wallet</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('uang-masuk*') ? 'active' : '' }}">
                    <a href="{{ route('uang-masuk.index') }}" class="menu-link">
                        <i class="menu-icon bx bx-trending-up"></i>
                        <div>Uang Masuk</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('uang-keluar*') ? 'active' : '' }}">
                    <a href="{{ route('uang-keluar.index') }}" class="menu-link">
                        <i class="menu-icon bx bx-trending-down"></i>
                        <div>Uang Keluar</div>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('laporan*') ? 'active' : '' }}">
                    <a href="{{ route('laporan.bulanan') }}" class="menu-link">
                        <i class="menu-icon bx bx-line-chart"></i>
                        <div>Laporan Bulanan</div>
                    </a>
                </li>

            </ul>
        </aside>

        {{-- PAGE --}}
        <div class="layout-page">

            {{-- NAVBAR --}}
            @include('partials.navbar')

            {{-- CONTENT --}}
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>

                @include('partials.footer')
            </div>
        </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>
</div>

{{-- Core JS --}}
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

@stack('js')
</body>
</html>
