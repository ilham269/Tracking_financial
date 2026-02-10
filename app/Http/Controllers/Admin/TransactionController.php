<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Uang_keluar;
use App\Models\Uang_masuk;
use Illuminate\Support\Collection;

class TransactionController extends Controller
{
    public function index()
    {
        $uangMasuk = Uang_masuk::with(['saldo.user'])->get()->map(function ($um) {
            return [
                'user' => $um->saldo?->user,
                'saldo' => $um->saldo,
                'uang_masuk' => $um->nominal,
                'uang_keluar' => 0,
                'tanggal' => $um->tanggal_uang_masuk,
                'keterangan' => $um->keterangan,
                'type' => 'masuk',
            ];
        });

        $uangKeluar = Uang_keluar::with(['saldo.user'])->get()->map(function ($uk) {
            return [
                'user' => $uk->saldo?->user,
                'saldo' => $uk->saldo,
                'uang_masuk' => 0,
                'uang_keluar' => $uk->nominal,
                'tanggal' => $uk->tanggal_uang_keluar,
                'keterangan' => $uk->keterangan,
                'type' => 'keluar',
            ];
        });

        $rows = $uangMasuk
            ->concat($uangKeluar)
            ->sortByDesc('tanggal')
            ->values();

        return view('Admin.transactions', [
            'rows' => $rows,
        ]);
    }
}
