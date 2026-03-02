<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/') }}/"
  data-template="vertical-menu-template-free"
>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register | Finance App</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
  />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Page CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
  <style>
    :root {
      --auth-bg: #f4f6fb;
      --auth-card: #ffffff;
      --auth-text: #111827;
      --auth-muted: #6b7280;
      --auth-border: #dbe1ea;
      --auth-dark: #111827;
    }

    body {
      min-height: 100vh;
      background:
        radial-gradient(circle at 15% 20%, rgba(17, 24, 39, 0.08), transparent 38%),
        radial-gradient(circle at 85% 80%, rgba(31, 41, 55, 0.08), transparent 36%),
        var(--auth-bg);
      color: var(--auth-text);
    }

    .auth-shell {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.25rem 0.75rem;
    }

    .authentication-wrapper.authentication-basic {
      padding: 0 !important;
    }

    .auth-card {
      width: min(100%, 460px);
      border: 1px solid rgba(17, 24, 39, 0.06);
      border-radius: 20px;
      box-shadow: 0 20px 45px rgba(17, 24, 39, 0.12);
      background: var(--auth-card);
    }

    .auth-card .card-body {
      padding: 2rem;
    }

    .auth-brand {
      font-size: 1.15rem;
      letter-spacing: 0.4px;
      color: var(--auth-text);
    }

    .auth-title {
      margin-bottom: 0.35rem;
      font-weight: 700;
      color: var(--auth-text);
    }

    .auth-subtitle {
      margin-bottom: 1.5rem;
      color: var(--auth-muted);
    }

    .form-label {
      font-size: 0.84rem;
      font-weight: 600;
      color: #1f2937;
      margin-bottom: 0.45rem;
    }

    .form-control,
    .input-group-text {
      border-color: var(--auth-border);
      border-radius: 12px;
      min-height: 44px;
      background-color: #fff;
    }

    .input-group-text {
      border-left: 0;
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }

    .input-group .form-control {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }

    .form-control:focus,
    .input-group:focus-within .input-group-text {
      border-color: #111827;
      box-shadow: 0 0 0 0.2rem rgba(17, 24, 39, 0.08);
    }

    .btn-auth {
      background-color: var(--auth-dark);
      border-color: var(--auth-dark);
      border-radius: 12px;
      min-height: 46px;
      font-weight: 600;
      letter-spacing: 0.2px;
    }

    .btn-auth:hover {
      background-color: #000;
      border-color: #000;
    }

    .auth-link {
      color: #111827;
      font-weight: 600;
      text-decoration: none;
    }

    .auth-link:hover {
      text-decoration: underline;
    }

    @media (max-width: 575.98px) {
      .auth-card .card-body {
        padding: 1.35rem 1.1rem;
      }
    }
  </style>

  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>

<div class="container-xxl auth-shell">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">

      <div class="card auth-card">
        <div class="card-body">

          {{-- LOGO --}}
          <div class="app-brand justify-content-center mb-4">
            <span class="app-brand-text fw-bold auth-brand">Finance App</span>
          </div>

          <h4 class="auth-title">Create Account</h4>
          <p class="auth-subtitle">Create your account to get started</p>

          {{-- FORM --}}
          <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- NAME --}}
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your name"
                autofocus
              >
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- EMAIL --}}
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
              >
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- PASSWORD --}}
            <div class="mb-3 form-password-toggle">
              <label class="form-label">Password</label>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  class="form-control @error('password') is-invalid @enderror"
                  name="password"
                  placeholder="••••••••"
                >
                <span class="input-group-text cursor-pointer">
                  <i class="bx bx-hide"></i>
                </span>
              </div>
              @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>

            {{-- CONFIRM PASSWORD --}}
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input
                type="password"
                class="form-control"
                name="password_confirmation"
                placeholder="••••••••"
              >
            </div>

            {{-- SUBMIT --}}
            <button class="btn btn-primary d-grid w-100 btn-auth">
              Sign up
            </button>
          </form>

          <p class="text-center mt-3">
            <span>Already have an account?</span>
            <a href="{{ route('login') }}" class="auth-link">
              <span>Sign in instead</span>
            </a>
          </p>

        </div>
      </div>

    </div>
  </div>
</div>

<!-- Core JS -->
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
