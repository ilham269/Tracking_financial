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
    <title>@yield('title', 'Admin Dashboard')</title>

    {{-- Google Fonts --}}
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

    {{-- ===== CUSTOM MONOCHROME STYLE ===== --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f3f4f6;
        }

        /* ================= SIDEBAR ================= */
        .bg-menu-theme {
            background-color: #0f0f0f !important;
        }

        .app-brand {
            border-bottom: 1px solid #1f1f1f;
        }

        .app-brand-text {
            color: #ffffff !important;
            letter-spacing: .5px;
            font-weight: 600;
        }

        .menu-header-text {
            color: #9ca3af !important;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .menu-link {
            color: #e5e7eb !important;
            border-radius: 8px;
            margin: 4px 12px;
            transition: all .2s ease;
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

        /* ================= NAVBAR ================= */
        .layout-navbar {
            background-color: #ffffff !important;
            border-bottom: 1px solid #e5e7eb;
        }

        .layout-navbar .nav-link,
        .layout-navbar .navbar-brand {
            color: #111827 !important;
            font-weight: 500;
        }

        /* ================= CONTENT ================= */
        .content-wrapper {
            background-color: #f9fafb;
        }

        .card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        /* ================= FOOTER ================= */
        footer {
            background-color: transparent;
            color: #6b7280;
        }
    </style>

    @stack('css')
</head>

<body>

<div class="layout-wrapper layout-content-navbar">

    <div class="layout-container">

        {{-- SIDEBAR ADMIN --}}
        @include('components.sidebar')

        <div class="layout-page">

            {{-- NAVBAR ADMIN --}}
            @include('components.navbar')

            {{-- CONTENT --}}
            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    {{-- ALERT --}}
                    @includeWhen(session()->has('success') || session()->has('error'), 'alert')

                    @yield('content')

                </div>

                {{-- FOOTER --}}
                @include('components.footer')

            </div>

        </div>
    </div>

    {{-- Overlay --}}
    <div class="layout-overlay layout-menu-toggle"></div>

</div>

{{-- Core JS --}}
<script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>

@stack('js')
</body>
</html>
