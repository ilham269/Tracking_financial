<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\UangKeluarController;
use App\Http\Controllers\UangMasukController;
use App\Http\Controllers\LaporanController;
use App\Models\Uang_masuk;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])
    ->name('laporan.export.excel');

Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])
    ->name('laporan.export.pdf');


Route::get('/laporan/bulanan', [LaporanController::class, 'bulanan'])
    ->name('laporan.bulanan');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//saldo
Route::resource('saldo', SaldoController::class);
Route::resource('uang-keluar', UangKeluarController::class);
Route::resource('uang-masuk', UangMasukController::class)->only([
    'index',
    'create',
    'store'
]);

