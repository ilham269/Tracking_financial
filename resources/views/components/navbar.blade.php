<style>
    /* ===== NAVBAR MONOCHROME ===== */
    #layout-navbar {
        background-color: #ffffff !important;
        border-bottom: 1px solid #e5e7eb;
    }

    #layout-navbar .nav-link {
        color: #111827 !important;
        font-weight: 500;
    }

    #layout-navbar .nav-link:hover {
        color: #000000 !important;
    }

    /* Brand / Title */
    #layout-navbar .fs-5 {
        color: #111827 !important;
        letter-spacing: .5px;
    }

    /* Icons */
    #layout-navbar i {
        color: #374151;
    }

    /* Notification badge */
    .badge-notifications {
        font-size: 10px;
        padding: 4px 6px;
        background-color: #111827 !important;
    }

    /* Dropdown */
    .dropdown-menu {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,.12);
    }

    .dropdown-header {
        color: #111827;
        font-weight: 600;
    }

    .dropdown-item {
        font-weight: 500;
        color: #111827;
        border-radius: 8px;
    }

    .dropdown-item:hover {
        background-color: #f3f4f6;
        color: #000000;
    }

    .dropdown-item.text-danger {
        color: #b91c1c !important;
    }

    /* Avatar */
    .navbar img.rounded-circle {
        border: 2px solid #e5e7eb;
    }

    /* Divider */
    .dropdown-divider {
        border-color: #e5e7eb;
    }
</style>

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center shadow-sm"
     id="layout-navbar">

    {{-- Left --}}
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav align-items-center">
        <span class="fw-semibold fs-5">
            👑 Admin Panel
        </span>
    </div>

    {{-- Right --}}
    <div class="navbar-nav ms-auto align-items-center">

        {{-- Notification --}}
        <div class="nav-item dropdown me-3">
            <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                <i class="bx bx-bell bx-sm"></i>
                <span class="badge rounded-pill badge-notifications">3</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end p-2">
                <li class="dropdown-header">
                    Notifications
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-start" href="#">
                        <i class="bx bx-user-plus me-2"></i>
                        <div>
                            <small class="fw-semibold">User baru</small><br>
                            <small class="text-muted">Ilham mendaftar</small>
                        </div>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-start" href="#">
                        <i class="bx bx-shield-quarter me-2"></i>
                        <div>
                            <small class="fw-semibold">Admin login</small><br>
                            <small class="text-muted">Beberapa detik lalu</small>
                        </div>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li class="text-center">
                    <a href="#" class="dropdown-item fw-semibold">
                        View all
                    </a>
                </li>
            </ul>
        </div>

        {{-- Profile --}}
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                @if(auth()->user()->profile_photo_path)
                    <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                         alt="Avatar"
                         class="rounded-circle"
                         width="40" height="40">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=111827&color=fff"
                         alt="Avatar"
                         class="rounded-circle"
                         width="40" height="40">
                @endif
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-header text-center">
                    <strong>{{ auth()->user()->name }}</strong><br>
                    <small class="text-muted text-uppercase">Administrator</small>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bx bx-user me-2"></i> Profile
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i> Settings
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item text-danger">
                            <i class="bx bx-log-out me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

    </div>
</nav>
