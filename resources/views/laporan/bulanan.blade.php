@extends('layouts.app')

@section('content')
<div class="container">

    <h4 class="mb-4">📊 Laporan Bulanan</h4>

    {{-- FILTER BULAN & TAHUN --}}
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <select name="bulan" class="form-select">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                        {{ date('F', mktime(0,0,0,$i,1)) }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="col-md-3">
            <select name="tahun" class="form-select">
                @for ($y = date('Y') - 5; $y <= date('Y'); $y++)
                    <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">Tampilkan</button>
        </div>

        <div class="col-md-4 text-end">
            <a href="{{ route('laporan.export.excel', request()->all()) }}"
               class="btn btn-success me-2">
                <i class="bi bi-file-earmark-excel"></i> Excel
            </a>

            <a href="{{ route('laporan.export.pdf', request()->all()) }}"
               class="btn btn-danger">
                <i class="bi bi-filetype-pdf"></i> PDF
            </a>
        </div>
    </form>

    {{-- RINGKASAN --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Total Uang Masuk</small>
                    <h5 class="text-success">
                        Rp {{ number_format($totalMasuk,0,',','.') }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Total Uang Keluar</small>
                    <h5 class="text-danger">
                        Rp {{ number_format($totalKeluar,0,',','.') }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Saldo Akhir</small>
                    <h5 class="{{ $totalSaldo >= 0 ? 'text-success' : 'text-danger' }}">
                        Rp {{ number_format($totalSaldo,0,',','.') }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    {{-- STATUS --}}
    @if($totalSaldo > 0)
        <span class="badge bg-success">Surplus</span>
    @elseif($totalSaldo < 0)
        <span class="badge bg-danger">Defisit</span>
    @else
        <span class="badge bg-secondary">Balance</span>
    @endif

    {{-- CHART --}}
    <div class="mt-5">
        <h4 class="mb-3">📊 Chart Keuangan Tahun {{ $tahun }}</h4>

        <div class="card shadow-sm">
            <div class="card-body">
                <canvas id="keuanganChart"></canvas>
            </div>
        </div>
    </div>

</div>

{{-- CHART JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('keuanganChart'), {
    type: 'bar',
    data: {
        labels: @json($labels),
        datasets: [
            {
                label: 'Uang Masuk',
                data: @json($dataMasuk),
                backgroundColor: 'rgba(40,167,69,0.7)'
            },
            {
                label: 'Uang Keluar',
                data: @json($dataKeluar),
                backgroundColor: 'rgba(220,53,69,0.7)'
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' }
        }
    }
});
</script>
@endsection
