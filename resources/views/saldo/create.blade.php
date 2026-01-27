@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Saldo E-Wallet</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('saldo.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama E-Wallet</label>
            <input
                type="text"
                name="nama_e_wallet"
                class="form-control"
                placeholder="Contoh: Dana, OVO, GoPay"
                value="{{ old('nama_e_wallet') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Total Saldo</label>
            <input
                type="number"
                name="total"
                class="form-control"
                placeholder="Masukkan total saldo"
                value="{{ old('total') }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>
        <a href="{{ route('saldo.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
