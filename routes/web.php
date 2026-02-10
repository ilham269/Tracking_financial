<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\UangKeluarController;
use App\Http\Controllers\UangMasukController;
use App\Http\Controllers\LaporanController;
use App\Models\Uang_masuk;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});


// admin role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    });
});




Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])
    ->name('laporan.export.excel');

Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])
    ->name('laporan.export.pdf');


Route::get('/laporan/bulanan', [LaporanController::class, 'bulanan'])
    ->name('laporan.bulanan');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
});

//saldo
Route::resource('saldo', SaldoController::class);
Route::resource('uang-keluar', UangKeluarController::class);
Route::resource('uang-masuk', UangMasukController::class)->only([
    'index',
    'create',
    'store'
]);

//admin dashboard
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/transactions', [TransactionController::class, 'index'])
        ->name('admin.transactions.index');
});

Route::get('/Admin/users', [UserController::class, 'index'])->name('admin.users.index');
