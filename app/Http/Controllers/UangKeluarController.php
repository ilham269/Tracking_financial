<?php

namespace App\Http\Controllers;

use App\Models\Uang_keluar;
use App\Models\Saldo;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exit = Uang_keluar::with('saldo')
            ->whereHas('saldo', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

        return view('uang_keluar.index', compact('exit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $saldos = Saldo::where('user_id', auth()->id())->get();

        return view('uang_keluar.create', compact('saldos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'saldo_id' => [
                'required',
                Rule::exists('saldos', 'id')->where(function ($query) use ($request) {
                    $query->where('user_id', $request->user()->id);
                }),
            ],
            'nominal'  => 'required|numeric|min:1',
            'tanggal_uang_keluar'  => 'required|date',
            'keterangan' => 'nullable|string'
        ]);

        $saldo = Saldo::findOrFail($request->saldo_id);
        if ($request->nominal > $saldo->total) {
            return back()
                ->withErrors(['nominal' => 'Saldo tidak mencukupi'])
                ->withInput();
        }

        DB::transaction(function () use ($request, $saldo) {


            Uang_keluar::create([
                'nominal' => $request->nominal,
                'keterangan' => $request->keterangan,
                'tanggal_uang_keluar' => $request->tanggal_uang_keluar,
                'saldo_id' => $request->saldo_id,
            ]);

            $saldo->total -= $request->nominal;
            $saldo->save();
        });

        return redirect()->route('uang-keluar.index')
            ->with('success', 'Uang keluar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Uang_keluar $uang_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Uang_keluar $uang_keluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uang_keluar $uang_keluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Uang_keluar $uang_keluar)
    {
        //
    }
}
