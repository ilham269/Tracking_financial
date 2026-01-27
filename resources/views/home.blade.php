@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- Header --}}
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-gradient-primary text-white shadow">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-1">💳 Dashboard Keuangan</h4>
                    <small>Ringkasan kondisi e-wallet kamu</small>
                </div>
                <h3 class="mb-0">Rp {{ number_format($totalSaldo,0,',','.') }}</h3>
            </div>
        </div>
    </div>
</div>

{{-- Summary Cards --}}
<div class="row g-3 mb-4">

    {{-- Uang Masuk --}}
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">

                <div class="ms-3">
                    <small class="text-muted">Uang Masuk</small>
                    <h5 class="text-success mb-0">
                        Rp {{ number_format($totalMasuk,0,',','.') }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    {{-- Uang Keluar --}}
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">

                <div class="ms-3">
                    <small class="text-muted">Uang Keluar</small>
                    <h5 class="text-danger mb-0">
                        Rp {{ number_format($totalKeluar,0,',','.') }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    {{-- Saldo Akhir --}}
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-coin" style="font-size: 2rem"></i>
                <div class="ms-3">
                    <small class="text-muted">Saldo Akhir</small>
                    <h5 class="mb-0 ">
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
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-3">⚡ Aksi Cepat</h5>

                <a href="{{ route('uang-masuk.create') }}" class="btn btn-success me-2">
                    ➕ Uang Masuk
                </a>

                <a href="{{ route('uang-keluar.create') }}" class="btn btn-danger me-2">
                    ➖ Uang Keluar
                </a>

                <a href="{{ route('saldo.index') }}" class="btn btn-primary">
                    💳 E-Wallet
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="card-shadow-sm">
        <div class="card-body">
            <h1>
                Selamat datang kembali, {{ auth()->user()->name }}!
            </h1>
            <h5>
                Mari kelola keuanganmu dengan bijak hari ini!
            </h5>

        </div>
    </div>
</div>

@endsection
