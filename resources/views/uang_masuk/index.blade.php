@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Uang Masuk</h5>
        <a href="{{ route('uang-masuk.create') }}" class="btn btn-primary btn-sm">
            <i class="bx bx-plus-circle"></i> Tambah Uang Masuk
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
                @forelse ($enter as $um)
                    <tr>
                        <td>
                            <span class="fw-semibold">#{{ $um->id }}</span>
                        </td>

                        <td>
                            <span class="badge bg-label-success">
                                + Rp {{ number_format($um->nominal, 0, ',', '.') }}
                            </span>
                        </td>

                        <td>
                            {{ $um->keterangan ?? '-' }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($um->tanggal_uang_masuk)->format('d M Y') }}
                        </td>

                        <td>
                            <span class="badge bg-label-primary">
                                {{ $um->saldo->nama_e_wallet }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Data uang masuk belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
