<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uang_masuk;
use App\Models\Uang_keluar;
use App\Exports\LaporanBulananExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function bulanan(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        // =====================
        // RINGKASAN BULANAN
        // =====================
        $totalMasuk = Uang_masuk::whereMonth('tanggal_uang_masuk', $bulan)
            ->whereYear('tanggal_uang_masuk', $tahun)
            ->sum('nominal');

        $totalKeluar = Uang_keluar::whereMonth('tanggal_uang_keluar', $bulan)
            ->whereYear('tanggal_uang_keluar', $tahun)
            ->sum('nominal');

        $totalSaldo = $totalMasuk - $totalKeluar;

        // =====================
        // DATA CHART (TAHUNAN)
        // =====================
        $masuk = Uang_masuk::select(
            DB::raw('MONTH(tanggal_uang_masuk) as bulan'),
            DB::raw('SUM(nominal) as total')
        )
            ->whereYear('tanggal_uang_masuk', $tahun)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $keluar = Uang_keluar::select(
            DB::raw('MONTH(tanggal_uang_keluar) as bulan'),
            DB::raw('SUM(nominal) as total')
        )
            ->whereYear('tanggal_uang_keluar', $tahun)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $labels = [];
        $dataMasuk = [];
        $dataKeluar = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('F', mktime(0, 0, 0, $i, 1));
            $dataMasuk[] = $masuk[$i] ?? 0;
            $dataKeluar[] = $keluar[$i] ?? 0;
        }

        return view('laporan.bulanan', compact(
            'bulan',
            'tahun',
            'totalMasuk',
            'totalKeluar',
            'totalSaldo',
            'labels',
            'dataMasuk',
            'dataKeluar'
        ));
    }



    public function exportExcel(Request $request)
    {
        return Excel::download(
            new LaporanBulananExport($request->bulan, $request->tahun),
            'laporan-bulanan.xlsx'
        );
    }


    public function exportPdf(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $data = collect();

        $data = $data->merge(
            Uang_masuk::whereMonth('tanggal_uang_masuk', $bulan)
                ->whereYear('tanggal_uang_masuk', $tahun)
                ->get()
                ->map(fn($i) => [
                    'tanggal' => $i->tanggal_uang_masuk,
                    'jenis' => 'Masuk',
                    'nominal' => $i->nominal,
                    'keterangan' => $i->keterangan
                ])
        );

        $data = $data->merge(
            Uang_keluar::whereMonth('tanggal_uang_keluar', $bulan)
                ->whereYear('tanggal_uang_keluar', $tahun)
                ->get()
                ->map(fn($i) => [
                    'tanggal' => $i->tanggal_uang_keluar,
                    'jenis' => 'Keluar',
                    'nominal' => $i->nominal,
                    'keterangan' => $i->keterangan
                ])
        );

        $pdf = Pdf::loadView('laporan.pdf', compact('data', 'bulan', 'tahun'));

        return $pdf->download('laporan-bulanan.pdf');
    }


    public function chart(Request $request)
    {
        $tahun = $request->tahun ?? date('Y');

        $masuk = Uang_masuk::select(
            DB::raw('MONTH(tanggal_uang_masuk) as bulan'),
            DB::raw('SUM(nominal) as total')
        )
            ->whereYear('tanggal_uang_masuk', $tahun)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $keluar = Uang_keluar::select(
            DB::raw('MONTH(tanggal_uang_keluar) as bulan'),
            DB::raw('SUM(nominal) as total')
        )
            ->whereYear('tanggal_uang_keluar', $tahun)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $labels = [];
        $dataMasuk = [];
        $dataKeluar = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = date('F', mktime(0, 0, 0, $i, 1));
            $dataMasuk[] = $masuk[$i] ?? 0;
            $dataKeluar[] = $keluar[$i] ?? 0;
        }

        return view('laporan.chart', compact(
            'labels',
            'dataMasuk',
            'dataKeluar',
            'tahun'
        ));
    }
}
