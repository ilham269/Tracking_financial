<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saldos = Saldo::all();
        return view('saldo.index', compact('saldos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('saldo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_e_wallet' => 'required|string|max:255',
            'total' => 'required|numeric'
        ]);

        Saldo::create([
            'nama_e_wallet' => $request->nama_e_wallet,
            'total' => $request->total
        ]);
        return redirect()->route('saldo.index')->with('success', 'Saldo berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Saldo $saldo)
    {
        return view('saldo.show', compact('saldo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Saldo $saldo)
    {
        return view('saldo.edit', compact('saldo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saldo $saldo)
    {
        $request->validate([
            'nama_e_wallet'  => 'required|string|max:255',
            'total' => 'required|numeric'
        ]);

        $saldo->update([
            'nama_e_wallet'  => $request->nama_e_wallet,
            'total' => $request->total
        ]);

        return redirect()->route('saldo.index')
            ->with('success', 'Data saldo berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saldo $saldo)
    {
        $saldo->delete();

        return redirect()->route('saldo.index')
            ->with('success', 'Data saldo berhasil dihapus');
    }
}
