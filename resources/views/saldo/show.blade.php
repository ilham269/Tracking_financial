@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Saldo</h3>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $saldo->id }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $saldo->nama }}</td>
        </tr>
        <tr>
            <th>Total Saldo</th>
            <td>Rp {{ number_format($saldo->total, 0, ',', '.') }}</td>
        </tr>
    </table>

    <a href="{{ route('saldo.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>
@endsection
