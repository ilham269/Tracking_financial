<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;
use App\Models\Uang_keluar;
use App\Models\Uang_masuk;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ambil user yang sedang login
        $userId = auth()->id();

        // Ambil total saldo hanya untuk user yang login
        $totalSaldo = Saldo::where('user_id', $userId)->sum('total');

        // Ambil ID saldo milik user yang login
        $saldoIds = Saldo::where('user_id', $userId)->pluck('id');

        // Hitung total uang masuk dan keluar hanya dari saldo user yang login
        $totalMasuk = Uang_masuk::whereIn('saldo_id', $saldoIds)->sum('nominal');
        $totalKeluar = Uang_keluar::whereIn('saldo_id', $saldoIds)->sum('nominal');

        return view('home', compact(
            'totalSaldo',
            'totalMasuk',
            'totalKeluar'
        ));
    }
}
