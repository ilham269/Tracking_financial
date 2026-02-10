<style>
    /* ================= SIDEBAR DARK BASE ================= */
    #layout-menu {
        width: 260px;
        background-color: #0f0f10;
        border-right: 1px solid #1f1f1f;
        color: #e5e5e5;
    }

    /* ================= BRAND ================= */
    .app-brand {
        height: 72px;
        border-bottom: 1px solid #1f1f1f;
    }

    .app-brand-text {
        font-size: 0.85rem;
        letter-spacing: 1.2px;
        color: #ffffff !important;
    }

    /* ================= SECTION HEADER ================= */
    .menu-header {
        margin: 20px 0 8px;
        padding-left: 1.75rem;
    }

    .menu-header-text {
        font-size: 0.7rem;
        letter-spacing: 1.3px;
        color: #8b8b8b;
    }

    /* ================= MENU ITEM ================= */
    .menu-inner {
        padding: 0 0.75rem;
    }

    .menu-item {
        margin-bottom: 6px;
    }

    .menu-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 11px 14px;
        border-radius: 12px;
        color: #d1d1d1;
        transition: background 0.2s ease, color 0.2s ease;
    }

    .menu-link:hover {
        background-color: #1b1b1d;
        color: #ffffff;
    }

    .menu-item.active > .menu-link {
        background-color: #ffffff;
        color: #0f0f10;
    }

    .menu-item.active .menu-icon {
        color: #0f0f10;
    }

    .menu-icon {
        font-size: 1.15rem;
        color: #9a9a9a;
    }

    /* ================= LOGOUT ================= */
    .menu-link.btn {
        border: none;
        background: transparent;
    }

    .menu-link.btn:hover {
        background-color: #2a1d1d;
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu">

    {{-- BRAND --}}
    <div class="app-brand d-flex align-items-center justify-content-between px-4">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
            <span class="app-brand-text fw-bold">
                ADMIN PANEL
            </span>
        </a>
        <span class="badge bg-light text-dark rounded-pill px-2">
            ADMIN
        </span>
    </div>

    <ul class="menu-inner py-3">

        {{-- DASHBOARD --}}
        <li class="menu-header">
            <span class="menu-header-text">DASHBOARD</span>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon bx bx-home-circle"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon bx bx-arrow-back"></i>
                <span>Kembali ke Home</span>
            </a>
        </li>

        {{-- MANAGEMENT --}}
        <li class="menu-header">
            <span class="menu-header-text">MANAGEMENT</span>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}" class="menu-link">
                <i class="menu-icon bx bx-user"></i>
                <span>Manajemen User</span>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">
            <a href="{{ route('admin.transactions.index') }}" class="menu-link">
                <i class="menu-icon bx bx-wallet"></i>
                <span>Laporan Transaksi</span>
            </a>
        </li>

        {{-- SYSTEM --}}
        <li class="menu-header">
            <span class="menu-header-text">SYSTEM</span>
        </li>

        <li class="menu-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu-link btn w-100 text-start">
                    <i class="menu-icon bx bx-log-out text-danger"></i>
                    <span class="text-danger">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</aside>
