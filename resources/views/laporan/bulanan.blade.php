@extends('layouts.app')

@section('content')
<div class="container-xxl py-4 page-dark">

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
        <div>
            <p class="text-uppercase letter-spaced text-muted mb-1">Laporan</p>
            <h4 class="mb-0 text-white">Laporan Bulanan</h4>
        </div>
        <span class="badge badge-role px-3 py-2 rounded-pill">Ringkasan</span>
    </div>

    {{-- FILTER BULAN & TAHUN --}}
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <select name="bulan" class="form-select form-dark">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                        {{ date('F', mktime(0,0,0,$i,1)) }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="col-md-3">
            <select name="tahun" class="form-select form-dark">
                @for ($y = date('Y') - 5; $y <= date('Y'); $y++)
                    <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>
                        {{ $y }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary btn-soft w-100">Tampilkan</button>
        </div>

        <div class="col-md-4 text-end">
            <a href="{{ route('laporan.export.excel', request()->all()) }}"
               class="btn btn-success btn-soft me-2">
                <i class="bi bi-file-earmark-excel"></i> Excel
            </a>

            <a href="{{ route('laporan.export.pdf', request()->all()) }}"
               class="btn btn-danger btn-soft">
                <i class="bi bi-filetype-pdf"></i> PDF
            </a>
        </div>
    </form>

    {{-- RINGKASAN --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card border-0 rounded-4 card-elevated">
                <div class="card-body">
                    <small class="text-muted">Total Uang Masuk</small>
                    <h5 class="text-success mb-0">
                        Rp {{ number_format($totalMasuk,0,',','.') }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 rounded-4 card-elevated">
                <div class="card-body">
                    <small class="text-muted">Total Uang Keluar</small>
                    <h5 class="text-danger mb-0">
                        Rp {{ number_format($totalKeluar,0,',','.') }}
                    </h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 rounded-4 card-elevated">
                <div class="card-body">
                    <small class="text-muted">Saldo Akhir</small>
                    <h5 class="mb-0 {{ $totalSaldo >= 0 ? 'text-success' : 'text-danger' }}">
                        Rp {{ number_format($totalSaldo,0,',','.') }}
                    </h5>
                </div>
            </div>
        </div>
    </div>

    {{-- STATUS --}}
    @if($totalSaldo > 0)
        <span class="badge badge-soft-success">Surplus</span>
    @elseif($totalSaldo < 0)
        <span class="badge badge-soft-danger">Defisit</span>
    @else
        <span class="badge badge-soft-secondary">Balance</span>
    @endif

    {{-- CHART --}}
    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
            <h4 class="mb-0 text-white">Chart Keuangan Tahun {{ $tahun }}</h4>
            <small class="text-muted">Perbandingan uang masuk dan keluar</small>
        </div>

        <div class="card border-0 rounded-4 card-elevated">
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
<style>
    .page-dark {
        color: #e5e5e5;
    }

    .page-dark .card-elevated {
        background-color: #141416;
        border: 1px solid #1f1f1f;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25) !important;
    }

    .page-dark .text-muted {
        color: #9a9a9a !important;
    }

    .page-dark .letter-spaced {
        letter-spacing: 1.2px;
        font-size: 0.72rem;
    }

    .page-dark .badge-role {
        background-color: #ffffff;
        color: #0f0f10;
        font-weight: 600;
        letter-spacing: 0.8px;
    }

    .page-dark .form-dark {
        background-color: #141416;
        border-color: #1f1f1f;
        color: #e5e5e5;
    }

    .page-dark .form-dark:focus {
        border-color: #2e2e35;
        box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.08);
    }

    .page-dark .btn-soft {
        border: 1px solid transparent;
        box-shadow: none;
    }

    .page-dark .btn-soft.btn-primary {
        background-color: rgba(255, 255, 255, 0.12);
        border-color: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    .page-dark .btn-soft.btn-success {
        background-color: rgba(25, 135, 84, 0.15);
        border-color: rgba(25, 135, 84, 0.35);
        color: #8fe6c7;
    }

    .page-dark .btn-soft.btn-danger {
        background-color: rgba(220, 53, 69, 0.15);
        border-color: rgba(220, 53, 69, 0.35);
        color: #ff9aa5;
    }

    .page-dark .badge-soft-success {
        background-color: rgba(25, 135, 84, 0.15);
        border: 1px solid rgba(25, 135, 84, 0.35);
        color: #8fe6c7;
    }

    .page-dark .badge-soft-danger {
        background-color: rgba(220, 53, 69, 0.15);
        border: 1px solid rgba(220, 53, 69, 0.35);
        color: #ff9aa5;
    }

    .page-dark .badge-soft-secondary {
        background-color: rgba(108, 117, 125, 0.2);
        border: 1px solid rgba(108, 117, 125, 0.4);
        color: #c9cdd2;
    }
</style>
