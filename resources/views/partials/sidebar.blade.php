<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sidebar Financial Tracking</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        /* ===== SIDEBAR THEME ===== */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background-color: #0f0f0f;
        }

        .sidebar a {
            text-decoration: none;
        }

        .brand {
            border-bottom: 1px solid #1f1f1f;
        }

        .brand-text {
            letter-spacing: 0.5px;
        }

        .menu-header {
            font-size: 11px;
            letter-spacing: 1px;
            color: #9ca3af;
        }

        .menu-link {
            color: #e5e7eb;
            border-radius: 8px;
            transition: 0.2s ease;
        }

        .menu-link:hover {
            background-color: #1f1f1f;
            color: #ffffff;
        }

        .menu-link i {
            font-size: 1.25rem;
            color: #d1d5db;
        }

        .active-menu {
            background-color: #ffffff;
            color: #0f0f0f !important;
            font-weight: 600;
        }

        .active-menu i {
            color: #0f0f0f;
        }
    </style>
</head>
<body class="d-flex">

<aside class="sidebar shadow-sm">

    <!-- BRAND -->
    <div class="brand px-4 py-3">
        <a href="{{ route('home') }}" class="d-flex align-items-center gap-2 text-white">
            <span class="fs-4"><i class="bi bi-currency-exchange"></i></span>
            <span class="brand-text fw-bold fs-5">Financial Tracking</span>
        </a>
    </div>

    <!-- MENU -->
    <ul class="nav flex-column px-2 mt-3">

        <li class="nav-item mb-1">
            <a href="{{ route('home') }}"
               class="nav-link menu-link {{ request()->routeIs('home') ? 'active-menu' : '' }}">
                <i class="bx bx-grid-alt me-2"></i> Home
            </a>
        </li>

        <li class="px-3 mt-4 mb-2 menu-header">
            KEUANGAN
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('saldo.index') }}"
               class="nav-link menu-link {{ request()->is('saldo*') ? 'active-menu' : '' }}">
                <i class="bx bx-credit-card me-2"></i> Saldo / E-Wallet
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('uang-masuk.index') }}"
               class="nav-link menu-link {{ request()->is('uang-masuk*') ? 'active-menu' : '' }}">
                <i class="bx bx-trending-up me-2"></i> Uang Masuk
            </a>
        </li>

        <li class="nav-item mb-1">
            <a href="{{ route('uang-keluar.index') }}"
               class="nav-link menu-link {{ request()->is('uang-keluar*') ? 'active-menu' : '' }}">
                <i class="bx bx-trending-down me-2"></i> Uang Keluar
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('laporan.bulanan') }}"
               class="nav-link menu-link {{ request()->is('laporan*') ? 'active-menu' : '' }}">
                <i class="bx bx-line-chart me-2"></i> Laporan Bulanan
            </a>
        </li>

    </ul>
</aside>

</body>
</html>
