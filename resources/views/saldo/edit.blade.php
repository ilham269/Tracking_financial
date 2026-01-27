@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Saldo E-Wallet</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('saldo.update', $saldo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama E-Wallet</label>
            <input
                type="text"
                name="nama_e_wallet"
                class="form-control"
                value="{{ old('nama_e_wallet', $saldo->nama_e_wallet) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Total Saldo</label>
            <input
                type="number"
                name="total"
                class="form-control"
                value="{{ old('total', $saldo->total) }}"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>
        <a href="{{ route('saldo.index') }}" class="btn btn-secondary">
            Batal
        </a>
    </form>
</div>
@endsection
