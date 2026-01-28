@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Uang Keluar</h5>
        <a href="{{ route('uang-keluar.create') }}" class="btn btn-danger btn-sm">
            <i class="bx bx-minus-circle"></i> Tambah Uang Keluar
        </a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
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
                            <span class="badge bg-label-danger">
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
                            <span class="badge bg-label-primary">
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

@endsection
