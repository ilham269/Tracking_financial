@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Uang Masuk</h3>
        <a href="{{ route('uang-masuk.create') }}" class="btn btn-primary">
            + Tambah Uang Masuk
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @error('nominal')
    <small class="text-danger">{{ $message }}</small>
@enderror


    <table class="table table-bordered">
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
            @foreach ($enter as $um)
            <tr>
                <td>{{ $um->id }}</td>
                <td>Rp {{ number_format($um->nominal,0,',','.') }}</td>
                <td>{{ $um->keterangan ?? '-' }}</td>
                <td>{{ $um->tanggal_uang_masuk }}</td>
                <td>{{ $um->saldo->nama_e_wallet }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
