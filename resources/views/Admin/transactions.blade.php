@extends('layouts.Admin.app')

@section('title', 'Laporan Transaksi')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Transaksi</h5>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Saldo</th>
                    <th>Uang Masuk</th>
                    <th>Uang Keluar</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row['user']?->name ?? '-' }}</td>
                        <td>
                            @if($row['saldo'])
                                Rp {{ number_format($row['saldo']->total, 0, ',', '.') }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($row['uang_masuk'] > 0)
                                <span class="badge bg-label-success">
                                    + Rp {{ number_format($row['uang_masuk'], 0, ',', '.') }}
                                </span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if($row['uang_keluar'] > 0)
                                <span class="badge bg-label-danger">
                                    - Rp {{ number_format($row['uang_keluar'], 0, ',', '.') }}
                                </span>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($row['tanggal'])->format('d M Y') }}
                        </td>
                        <td>{{ $row['keterangan'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            Data transaksi belum tersedia
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
