@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Uang Keluar</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('uang-keluar.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" class="form-control"
                   value="{{ old('nominal') }}" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control"
                   value="{{ old('keterangan') }}">
        </div>

        <div class="mb-3">
            <label>Tanggal Uang Keluar</label>
            <input type="date" name="tanggal_uang_keluar" class="form-control"
                   value="{{ old('tanggal_uang_keluar') }}" required>
        </div>

        <div class="mb-3">
            <label>Pilih E-Wallet</label>
            <select name="saldo_id" class="form-control" required>
                <option value="">-- Pilih E-Wallet --</option>
                @foreach($saldos as $saldo)
                    <option value="{{ $saldo->id }}">
                        {{ $saldo->nama_e_wallet }}
                        (Rp {{ number_format($saldo->total,0,',','.') }})
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-danger">Simpan</button>
        <a href="{{ route('uang-keluar.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
