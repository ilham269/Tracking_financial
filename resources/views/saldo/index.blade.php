@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Saldo</h5>
        <a href="{{ route('saldo.create') }}" class="btn btn-primary btn-sm">
            <i class="bx bx-plus"></i> Tambah Saldo
        </a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
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
                            <span class="badge bg-label-success">
                                Rp {{ number_format($saldo->total, 0, ',', '.') }}
                            </span>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('saldo.show', $saldo->id) }}"
                               class="btn btn-sm btn-icon btn-info"
                               title="Detail">
                                <i class="bx bx-show"></i>
                            </a>

                            <a href="{{ route('saldo.edit', $saldo->id) }}"
                               class="btn btn-sm btn-icon btn-warning"
                               title="Edit">
                                <i class="bx bx-edit"></i>
                            </a>

                            <form action="{{ route('saldo.destroy', $saldo->id) }}"
                                  method="POST"
                                  class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-icon btn-danger"
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

@endsection
