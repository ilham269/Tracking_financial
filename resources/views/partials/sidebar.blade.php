<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme shadow-sm">

    {{-- BRAND --}}
    <div class="app-brand px-4 py-3 border-bottom">
        <a href="{{ route('home') }}" class="app-brand-link d-flex align-items-center gap-2">
            <span class="fs-4">💰</span>
            <span class="app-brand-text fw-bold fs-5">Financial</span>
        </a>
    </div>

    <ul class="menu-inner py-3">

        {{-- DASHBOARD --}}
        <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon bx bx-home-circle"></i>
                <div class="fw-semibold">Dashboard</div>
            </a>
        </li>

        {{-- SECTION --}}
        <li class="menu-header small text-uppercase mt-3">
            <span class="menu-header-text text-muted">Keuangan</span>
        </li>

        <li class="menu-item {{ request()->is('saldo*') ? 'active' : '' }}">
            <a href="{{ route('saldo.index') }}" class="menu-link">
                <i class="menu-icon bx bx-wallet"></i>
                <div>Saldo / E-Wallet</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('uang-masuk*') ? 'active' : '' }}">
            <a href="{{ route('uang-masuk.index') }}" class="menu-link">
                <i class="menu-icon bx bx-log-in-circle text-success"></i>
                <div>Uang Masuk</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('uang-keluar*') ? 'active' : '' }}">
            <a href="{{ route('uang-keluar.index') }}" class="menu-link">
                <i class="menu-icon bx bx-log-out-circle text-danger"></i>
                <div>Uang Keluar</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('laporan*') ? 'active' : '' }}">
    <a href="{{ route('laporan.bulanan') }}" class="menu-link">
        <i class="menu-icon bx bx-bar-chart"></i>
        <div>Laporan Bulanan</div>
    </a>
</li>


    </ul>
</aside>
