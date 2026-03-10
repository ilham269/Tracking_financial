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
    #layout-navbar .dropdown-menu {
        border: none;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0,0,0,.12);
    }

    #layout-navbar .dropdown-header {
        color: #111827;
        font-weight: 600;
    }

    #layout-navbar .dropdown-item {
        font-weight: 500;
        color: #111827;
        border-radius: 8px;
    }

    #layout-navbar .dropdown-item:hover {
        background-color: #f3f4f6;
        color: #000000;
    }

    #layout-navbar .dropdown-item.text-danger {
        color: #b91c1c !important;
    }

    /* Avatar */
    #layout-navbar img.rounded-circle {
        border: 2px solid #e5e7eb;
    }

    .admin-avatar-fallback {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #111827;
        color: #ffffff;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    /* Divider */
    #layout-navbar .dropdown-divider {
        border-color: #e5e7eb;
    }

    @media (max-width: 1199.98px) {
        #layout-navbar {
            padding: 0.5rem 0.75rem !important;
            min-height: 60px;
        }

        #layout-navbar .fs-5 {
            font-size: 1rem !important;
        }

        #layout-navbar .nav-link {
            padding: 0.4rem 0.45rem;
        }
    }

    @media (max-width: 575.98px) {
        #layout-navbar {
            padding: 0.45rem 0.6rem !important;
            min-height: 56px;
        }

        #layout-navbar .fs-5 {
            font-size: 0.92rem !important;
        }

        .badge-notifications {
            font-size: 9px;
            padding: 3px 5px;
        }

        #layout-navbar img.rounded-circle,
        .admin-avatar-fallback {
            width: 36px !important;
            height: 36px !important;
        }
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
            Admin Panel
        </span>
    </div>

    {{-- Right --}}
    <div class="navbar-nav ms-auto align-items-center">
        @auth

        {{-- Profile --}}
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                @if(auth()->user()->profile_photo_path)
                    <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                         alt="Avatar"
                         class="rounded-circle"
                         width="40" height="40">
                @else
                    <span class="admin-avatar-fallback">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
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
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bx bx-log-out me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth

    </div>
</nav>
