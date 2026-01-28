<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    {{-- Brand --}}
    <div class="app-brand demo d-flex align-items-center justify-content-between px-3">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold text-primary">
                👑 ADMIN PANEL
            </span>
        </a>

        <span class="badge bg-primary">ADMIN</span>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        {{-- SECTION: DASHBOARD --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Dashboard</span>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>

        {{-- SECTION: MANAGEMENT --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Management</span>
        </li>

        <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}" class="menu-link">
                <i class="menu-icon bx bx-user"></i>
                <div>Manajemen User</div>
            </a>
        </li>

        {{-- SECTION: SYSTEM --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">System</span>
        </li>

        <li class="menu-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="menu-link btn w-100 text-start">
                    <i class="menu-icon bx bx-log-out text-danger"></i>
                    <div class="text-danger">Logout</div>
                </button>
            </form>
        </li>

    </ul>
</aside>
