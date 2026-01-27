@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Uang Masuk</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('uang-masuk.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nominal</label>
            <input type="number" name="nominal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal Uang Masuk</label>
            <input type="date" name="tanggal_uang_masuk" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pilih E-Wallet</label>
            <select name="saldo_id" class="form-control" required>
                <option value="">-- Pilih E-Wallet --</option>
                @foreach($saldos as $saldo)
                    <option value="{{ $saldo->id }}">
                        {{ $saldo->nama_e_wallet }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('uang-masuk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
