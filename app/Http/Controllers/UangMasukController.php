<?php

namespace App\Http\Controllers;

use App\Models\Uang_masuk;
use App\Models\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enter = Uang_masuk::with('saldo')->latest()->get();
        return view('uang_masuk.index', compact('enter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $saldos = Saldo::all();
        return view('uang_masuk.create', compact('saldos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ✅ VALIDASI
        $validated = $request->validate([
            'saldo_id' => 'required|exists:saldos,id',
            'nominal'  => 'required|numeric|min:1',
            'keterangan' => 'nullable|string|max:255',
            'tanggal_uang_masuk' => 'required|date',
        ]);

        DB::transaction(function () use ($validated) {

            // Simpan uang masuk
            $uangMasuk = Uang_masuk::create([
                'saldo_id'   => $validated['saldo_id'],
                'nominal'    => $validated['nominal'],
                'keterangan' => $validated['keterangan'] ?? null,
                'tanggal_uang_masuk'    => $validated['tanggal_uang_masuk'],
            ]);

            // Update saldo
            $saldo = Saldo::findOrFail($validated['saldo_id']);
            $saldo->total += $validated['nominal'];
            $saldo->save();
        });


        return redirect()->route('uang-masuk.index')
            ->with('success', 'Uang masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Uang_masuk $uang_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uang_masuk $uang_masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uang_masuk $uang_masuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uang_masuk $uang_masuk)
    {
        //
    }
}

