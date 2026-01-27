<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saldo;
use App\Models\Uang_keluar;
use App\Models\Uang_masuk;
use App\Models\UangMasuk;;
use App\Models\UangKeluar;

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
        $totalSaldo = Saldo::sum('total');
        $totalMasuk = Uang_masuk::sum('nominal');
        $totalKeluar = Uang_keluar::sum('nominal');

        return view('home', compact(
            'totalSaldo',
            'totalMasuk',
            'totalKeluar'
        ));
    }
}
