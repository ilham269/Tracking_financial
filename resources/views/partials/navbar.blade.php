<style>
    /* ===== NAVBAR STYLE ===== */
    .layout-navbar {
        background: #fff;
        border: 1px solid #eee;
    }

    .navbar-brand span {
        letter-spacing: .5px;
    }

    /* ===== AVATAR ===== */
    .avatar-dark {
        width: 40px;
        height: 40px;
        background: #111;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.95rem;
    }

    /* ===== DROPDOWN ===== */
    .dropdown-menu {
        font-size: 0.9rem;
    }

    .dropdown-item {
        color: #222;
    }

    .dropdown-item:hover {
        background-color: #f5f5f5;
    }
</style>

<nav class="layout-navbar navbar navbar-expand-xl navbar-detached shadow-sm rounded-3 px-4">
    <div>
        <a href="{{ route('home') }}" class="navbar-brand">
            <span class="fw-bold text-dark">
                Financial Tracking
            </span>
        </a>
    </div>

    <div class="d-flex align-items-center ms-auto">
        <ul class="navbar-nav align-items-center">

            <li class="nav-item dropdown">
                <a class="nav-link d-flex align-items-center gap-3 dropdown-toggle text-dark"
                   href="#"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">

                    {{-- AVATAR --}}
                    @auth
                        @if(auth()->user()->profile_photo_path)
                            <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                                 alt="Avatar"
                                 class="rounded-circle border"
                                 width="40" height="40">
                        @else
                            <div class="avatar-dark">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif
                    @else
                        <div class="avatar-dark">G</div>
                    @endauth

                    {{-- NAME --}}
                    <div class="text-start d-none d-md-block">
                        <div class="fw-semibold text-dark">
                            @auth {{ auth()->user()->name }} @else Guest @endauth
                        </div>
                        <small class="text-muted">
                            @auth {{ auth()->user()->role }} @else Visitor @endauth
                        </small>
                    </div>
                </a>

                {{-- DROPDOWN --}}
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                    <li class="px-3 py-2">
                        <strong class="text-dark">
                            @auth {{ auth()->user()->name }} @else Guest @endauth
                        </strong><br>
                        <small class="text-muted">
                            @auth Administrator @else Visitor @endauth
                        </small>
                    </li>

                    @auth
                        @if(auth()->user()->role === 'admin')
                            <li>
                                <a class="dropdown-item" href="/admin/dashboard">
                                    Admin Panel
                                </a>
                            </li>
                        @endif
                    @endauth

                    <li><hr class="dropdown-divider"></li>

                    @auth
                        <li>
                            <a class="dropdown-item text-danger"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </li>

        </ul>

        @auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        @endauth
    </div>
</nav>
