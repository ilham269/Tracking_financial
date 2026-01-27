<nav class="layout-navbar navbar navbar-expand-xl navbar-detached bg-white shadow-sm rounded-3 px-4">
    <div>
        <a href="{{ route('home') }}" class="navbar-brand">
            <span class="fw-bold text-primary">💰 Financial tracktion</span>
        </a>
    </div>
    <div class="d-flex align-items-center ms-auto">
        <ul class="navbar-nav align-items-center">

            <li class="nav-item dropdown">
                <a class="nav-link d-flex align-items-center gap-2 dropdown-toggle"
                   href="#"
                   data-bs-toggle="dropdown"
                   aria-expanded="false">

                    {{-- AVATAR --}}
                    <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                         style="width:40px;height:40px;">
                        @auth
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        @else
                            G
                        @endauth
                    </div>

                    {{-- NAME --}}
                    <div class="text-start d-none d-md-block">
                        <div class="fw-semibold text-dark">
                            @auth
                                {{ auth()->user()->name }}
                            @else
                                Guest
                            @endauth
                        </div>
                        <small class="text-muted">
                            @auth Admin @else Visitor @endauth
                        </small>
                    </div>
                </a>

                {{-- DROPDOWN --}}
                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">
                    <li class="px-3 py-2">
                        <strong>
                            @auth {{ auth()->user()->name }} @else Guest @endauth
                        </strong><br>
                        <small class="text-muted">
                            @auth Administrator @else Visitor @endauth
                        </small>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    @auth
                        <li>
                            <a class="dropdown-item text-danger"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="bx bx-power-off me-2"></i> Logout
                            </a>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item"
                               href="{{ route('login') }}">
                                <i class="bx bx-log-in me-2"></i> Login
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
