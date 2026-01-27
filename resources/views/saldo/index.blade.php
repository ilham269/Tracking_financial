@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Data Saldo</h2>
        <a href="{{ route('saldo.create') }}" class="btn btn-primary">
            + Tambah Saldo
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
                <th>Nama</th>
                <th>Total Saldo</th>
                <th width="200px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($saldos as $saldo)
                <tr>
                    <td>{{ $saldo->id }}</td>
                    <td>{{ $saldo->nama_e_wallet }}</td>
                    <td>
                        Rp {{ number_format($saldo->total, 0, ',', '.') }}
                    </td>
                    <td>
                        <a href="{{ route('saldo.show', $saldo->id) }}"
                           class="btn btn-info btn-sm">
                            Show
                        </a>

                        <a href="{{ route('saldo.edit', $saldo->id) }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('saldo.destroy', $saldo->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Data saldo belum tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
