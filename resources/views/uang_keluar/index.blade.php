@extends('layouts.app')

@section('content')
<div class="container-xxl py-4 page-dark">
<div class="card border-0 rounded-4 card-elevated">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2 border-0 bg-transparent">
        <div>
            <p class="text-uppercase letter-spaced text-muted mb-1">Uang Keluar</p>
            <h5 class="mb-0 text-white">Data Uang Keluar</h5>
        </div>
        <a href="{{ route('uang-keluar.create') }}" class="btn btn-danger btn-soft rounded-pill px-3">
            <i class="bx bx-minus-circle"></i> Tambah Uang Keluar
        </a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-darklike align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>E-Wallet</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($exit as $uk)
                    <tr>
                        <td>
                            <span class="fw-semibold">#{{ $uk->id }}</span>
                        </td>

                        <td>
                            <span class="badge badge-soft-danger">
                                - Rp {{ number_format($uk->nominal, 0, ',', '.') }}
                            </span>
                        </td>

                        <td>
                            {{ $uk->keterangan ?? '-' }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($uk->tanggal_uang_keluar)->format('d M Y') }}
                        </td>

                        <td>
                            <span class="badge badge-soft-primary">
                                {{ $uk->saldo->nama_e_wallet }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Data uang keluar belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</div>

@endsection
<style>
    .page-dark {
        color: #e5e5e5;
    }

    .page-dark .card-elevated {
        background-color: #141416;
        border: 1px solid #1f1f1f;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25) !important;
    }

    .page-dark .text-muted {
        color: #9a9a9a !important;
    }

    .page-dark .letter-spaced {
        letter-spacing: 1.2px;
        font-size: 0.72rem;
    }

    .page-dark .btn-soft {
        border: 1px solid transparent;
        box-shadow: none;
    }

    .page-dark .btn-soft.btn-danger {
        background-color: rgba(220, 53, 69, 0.15);
        border-color: rgba(220, 53, 69, 0.35);
        color: #ff9aa5;
    }

    .page-dark .table-darklike {
        color: #e5e5e5;
    }

    .page-dark .table-darklike thead th {
        color: #9a9a9a;
        border-color: #1f1f1f;
        font-size: 0.78rem;
        letter-spacing: 0.8px;
        text-transform: uppercase;
    }

    .page-dark .table-darklike td,
    .page-dark .table-darklike th {
        border-color: #1f1f1f;
    }

    .page-dark .badge-soft-danger {
        background-color: rgba(220, 53, 69, 0.15);
        border: 1px solid rgba(220, 53, 69, 0.35);
        color: #ff9aa5;
    }

    .page-dark .badge-soft-primary {
        background-color: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }
</style>
