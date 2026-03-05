<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Uang_keluar;
use App\Models\Uang_masuk;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $uangMasuk = Uang_masuk::with(['saldo.user'])->get()->map(function ($um) {
            return [
                'id' => $um->id,
                'user_name' => $um->saldo?->user?->name ?? '-',
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
                'id' => $uk->id,
                'user_name' => $uk->saldo?->user?->name ?? '-',
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

    public function destroy(string $type, int $id)
    {
        if (!in_array($type, ['masuk', 'keluar'], true)) {
            return back()->with('error', 'Tipe transaksi tidak valid.');
        }

        DB::transaction(function () use ($type, $id) {
            if ($type === 'masuk') {
                $transaction = Uang_masuk::with('saldo')->findOrFail($id);

                if ($transaction->saldo) {
                    $transaction->saldo->total = max(
                        0,
                        $transaction->saldo->total - (int) $transaction->nominal
                    );
                    $transaction->saldo->save();
                }

                $transaction->delete();
                return;
            }

            $transaction = Uang_keluar::with('saldo')->findOrFail($id);

            if ($transaction->saldo) {
                $transaction->saldo->total += (int) $transaction->nominal;
                $transaction->saldo->save();
            }

            $transaction->delete();
        });

        return back()->with('success', 'Transaksi berhasil dihapus.');
    }
}
