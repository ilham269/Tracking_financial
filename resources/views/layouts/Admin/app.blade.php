<!DOCTYPE html>
<html lang="en"
      class="light-style layout-menu-fixed"
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

    {{-- Core CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}">

    {{-- Page CSS --}}
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

                    {{-- ALERT / FLASH MESSAGE --}}
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

{{-- Page JS --}}
@stack('js')

</body>
</html>
