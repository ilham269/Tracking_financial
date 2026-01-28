<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-white shadow-sm"
     id="layout-navbar">

    {{-- Left --}}
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav align-items-center">
        <span class="fw-semibold fs-5 text-primary">
            👑 Admin Panel
        </span>
    </div>

    {{-- Right --}}
    <div class="navbar-nav ms-auto align-items-center">

        {{-- Notification --}}
        <div class="nav-item dropdown me-3">
            <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                <i class="bx bx-bell bx-sm"></i>
                <span class="badge bg-danger rounded-pill badge-notifications">3</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end p-2 shadow">
                <li class="dropdown-header fw-semibold">
                    Notifications
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-start" href="#">
                        <i class="bx bx-user-plus text-primary me-2"></i>
                        <div>
                            <small class="fw-semibold">User baru</small><br>
                            <small class="text-muted">Ilham mendaftar</small>
                        </div>
                    </a>
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-start" href="#">
                        <i class="bx bx-shield-quarter text-warning me-2"></i>
                        <div>
                            <small class="fw-semibold">Admin login</small><br>
                            <small class="text-muted">Beberapa detik lalu</small>
                        </div>
                    </a>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li class="text-center">
                    <a href="#" class="dropdown-item text-primary fw-semibold">
                        View all
                    </a>
                </li>
            </ul>
        </div>

        {{-- Profile --}}
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle hide-arrow d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=4e73df&color=fff"
                     alt="Avatar"
                     class="rounded-circle"
                     width="40">
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li class="dropdown-header text-center">
                    <strong>{{ auth()->user()->name }}</strong><br>
                    <small class="text-muted text-uppercase">Administrator</small>
                </li>

                <li><hr class="dropdown-divider"></li>

                <li>
                    <a class="dropdown-item" href="#">
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
