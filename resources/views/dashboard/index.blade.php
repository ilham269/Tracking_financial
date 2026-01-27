@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<h4 class="fw-bold mb-4">📊 Dashboard Keuangan</h4>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <small>Total Saldo</small>
                <h4 class="fw-bold text-success">
                    Rp {{ number_format($totalSaldo) }}
                </h4>
            </div>
        </div>
    </div>
</div>
@endsection
