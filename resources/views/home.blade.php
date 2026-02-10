@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-xxl py-4 home-dashboard">

    {{-- Welcome --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4 card-elevated">
                <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <p class="text-uppercase letter-spaced text-muted mb-1">Dashboard</p>
                        <h4 class="mb-1 fw-semibold text-white">
                            Selamat datang, {{ auth()->user()->name }}
                        </h4>
                        <small class="text-muted">Kelola keuanganmu dengan bijak hari ini</small>
                    </div>
                    <span class="badge badge-role px-3 py-2 rounded-pill">
                        Admin
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- Header Saldo --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow rounded-4 card-saldo text-white">
                <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div>
                        <p class="text-uppercase letter-spaced mb-1 opacity-75">Total Saldo</p>
                        <small class="opacity-75">Ringkasan e-wallet kamu</small>
                    </div>
                    <h3 class="mb-0 fw-bold">
                        Rp {{ number_format($totalSaldo,0,',','.') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="row g-4 mb-4">

        {{-- Uang Masuk --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 card-elevated">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-circle bg-success-subtle text-success">
                        <i class="bi bi-arrow-down"></i>
                    </div>
                    <div class="ms-3">
                        <small class="text-muted text-uppercase letter-spaced">Uang Masuk</small>
                        <h5 class="mb-0 fw-semibold text-white">
                            Rp {{ number_format($totalMasuk,0,',','.') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Uang Keluar --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 card-elevated">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-circle bg-danger-subtle text-danger">
                        <i class="bi bi-arrow-up"></i>
                    </div>
                    <div class="ms-3">
                        <small class="text-muted text-uppercase letter-spaced">Uang Keluar</small>
                        <h5 class="mb-0 fw-semibold text-white">
                            Rp {{ number_format($totalKeluar,0,',','.') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- Saldo Akhir --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 h-100 card-elevated">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-circle bg-primary-subtle text-primary">
                        <i class="bi bi-wallet2"></i>
                    </div>
                    <div class="ms-3">
                        <small class="text-muted text-uppercase letter-spaced">Saldo Akhir</small>
                        <h5 class="mb-0 fw-semibold text-white">
                            Rp {{ number_format($totalSaldo,0,',','.') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Quick Action --}}
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 card-elevated">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                        <h5 class="mb-0 fw-semibold text-white">Aksi Cepat</h5>
                        <small class="text-muted">Buat transaksi baru dalam satu klik</small>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('uang-masuk.create') }}" class="btn btn-success btn-soft rounded-pill px-4">
                            <i class="bi bi-plus-circle me-1"></i> Uang Masuk
                        </a>

                        <a href="{{ route('uang-keluar.create') }}" class="btn btn-danger btn-soft rounded-pill px-4">
                            <i class="bi bi-dash-circle me-1"></i> Uang Keluar
                        </a>

                        <a href="{{ route('saldo.index') }}" class="btn btn-primary btn-soft rounded-pill px-4">
                            <i class="bi bi-wallet me-1"></i> E-Wallet
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
<style>
    .home-dashboard {
        color: #e5e5e5;
    }

    .home-dashboard .card-elevated {
        background-color: #141416;
        border: 1px solid #1f1f1f;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25) !important;
    }

    .home-dashboard .card-saldo {
        background: linear-gradient(135deg, #1b1b1f, #2a2a30);
        border: 1px solid #2e2e35;
        position: relative;
        overflow: hidden;
    }

    .home-dashboard .card-saldo::after {
        content: "";
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top right, rgba(255, 255, 255, 0.12), transparent 55%);
        pointer-events: none;
    }

    .home-dashboard .badge-role {
        background-color: #ffffff;
        color: #0f0f10;
        font-weight: 600;
        letter-spacing: 0.8px;
    }

    .home-dashboard .text-muted {
        color: #9a9a9a !important;
    }

    .home-dashboard .letter-spaced {
        letter-spacing: 1.2px;
        font-size: 0.72rem;
    }

    .home-dashboard .btn-soft {
        border: 1px solid transparent;
        box-shadow: none;
    }

    .home-dashboard .btn-soft.btn-success {
        background-color: rgba(25, 135, 84, 0.15);
        border-color: rgba(25, 135, 84, 0.35);
        color: #8fe6c7;
    }

    .home-dashboard .btn-soft.btn-danger {
        background-color: rgba(220, 53, 69, 0.15);
        border-color: rgba(220, 53, 69, 0.35);
        color: #ff9aa5;
    }

    .home-dashboard .btn-soft.btn-primary {
        background-color: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    .home-dashboard .btn-soft:hover {
        transform: translateY(-1px);
        filter: brightness(1.05);
    }

    .icon-circle {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }
</style>
