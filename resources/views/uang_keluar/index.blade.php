@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Data Uang Keluar</h3>
        <a href="{{ route('uang-keluar.create') }}" class="btn btn-danger">
            + Tambah Uang Keluar
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>E-Wallet</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($exit as $uk)
                <tr>
                    <td>{{ $uk->id }}</td>
                    <td class="text-danger">
                        - Rp {{ number_format($uk->nominal, 0, ',', '.') }}
                    </td>
                    <td>{{ $uk->keterangan ?? '-' }}</td>
                    <td>{{ $uk->tanggal_uang_keluar }}</td>
                    <td>{{ $uk->saldo->nama_e_wallet }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        Data uang keluar belum tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
