@extends('layouts.app')

@section('content')
<div class="container-xxl py-4 page-dark">
<div class="card border-0 rounded-4 card-elevated">
    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2 border-0 bg-transparent">
        <div>
            <p class="text-uppercase letter-spaced text-muted mb-1">Saldo</p>
            <h5 class="mb-0 text-white">Data Saldo</h5>
        </div>
        <a href="{{ route('saldo.create') }}" class="btn btn-primary btn-soft rounded-pill px-3">
            <i class="bx bx-plus"></i> Tambah Saldo
        </a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-darklike align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama E-Wallet</th>
                    <th>Total Saldo</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($saldos as $saldo)
                    <tr>
                        <td>
                            <span class="fw-semibold">#{{ $saldo->id }}</span>
                        </td>

                        <td>{{ $saldo->nama_e_wallet }}</td>

                        <td>
                            <span class="badge badge-soft-success">
                                Rp {{ number_format($saldo->total, 0, ',', '.') }}
                            </span>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('saldo.show', $saldo->id) }}"
                               class="btn btn-sm btn-icon btn-soft-info"
                               title="Detail">
                                <i class="bx bx-show"></i>
                            </a>

                            <a href="{{ route('saldo.edit', $saldo->id) }}"
                               class="btn btn-sm btn-icon btn-soft-warning"
                               title="Edit">
                                <i class="bx bx-edit"></i>
                            </a>

                            <form action="{{ route('saldo.destroy', $saldo->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-icon btn-soft-danger"
                                        title="Hapus"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            Data saldo belum tersedia
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
        background-color: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 255, 255, 0.2);
        color: #ffffff;
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

    .page-dark .badge-soft-success {
        background-color: rgba(25, 135, 84, 0.15);
        border: 1px solid rgba(25, 135, 84, 0.35);
        color: #8fe6c7;
    }

    .page-dark .btn-soft-info {
        background-color: rgba(13, 110, 253, 0.15);
        border-color: rgba(13, 110, 253, 0.35);
        color: #9bbcff;
    }

    .page-dark .btn-soft-warning {
        background-color: rgba(255, 193, 7, 0.18);
        border-color: rgba(255, 193, 7, 0.4);
        color: #ffd676;
    }

    .page-dark .btn-soft-danger {
        background-color: rgba(220, 53, 69, 0.15);
        border-color: rgba(220, 53, 69, 0.35);
        color: #ff9aa5;
    }
</style>
