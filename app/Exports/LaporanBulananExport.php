<?php

namespace App\Exports;

use App\Models\Uang_masuk;
use App\Models\Uang_keluar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanBulananExport implements FromCollection, WithHeadings
{
    protected $bulan, $tahun;

    public function __construct($bulan, $tahun)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        $masuk = Uang_masuk::whereMonth('tanggal_uang_masuk', $this->bulan)
            ->whereYear('tanggal_uang_masuk', $this->tahun)
            ->select('tanggal_uang_masuk as tanggal', 'nominal', 'keterangan')
            ->get()
            ->map(fn($i) => [
                'Tanggal' => $i->tanggal,
                'Jenis' => 'Masuk',
                'Nominal' => $i->nominal,
                'Keterangan' => $i->keterangan
            ]);

        $keluar = Uang_keluar::whereMonth('tanggal_uang_keluar', $this->bulan)
            ->whereYear('tanggal_uang_keluar', $this->tahun)
            ->select('tanggal_uang_keluar as tanggal', 'nominal', 'keterangan')
            ->get()
            ->map(fn($i) => [
                'Tanggal' => $i->tanggal,
                'Jenis' => 'Keluar',
                'Nominal' => $i->nominal,
                'Keterangan' => $i->keterangan
            ]);

        return $masuk->merge($keluar);
    }

    public function headings(): array
    {
        return ['Tanggal', 'Jenis', 'Nominal', 'Keterangan'];
    }
}
