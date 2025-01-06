<?php

use App\Http\Controllers\BbmController;
use App\Http\Controllers\SuppController;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [BbmController::class, 'index']);
Route::get('/bbm/create', [BbmController::class, 'create']);
Route::post('/bbm/store', [BbmController::class, 'store'])->name('bbm.store');
Route::get('/bbm/{bbm}', [BbmController::class, 'show']);
Route::get('/bbm/{kd_bbm}/edit', [BbmController::class, 'edit'])->name('bbm.edit');
Route::put('/bbm/{kd_bbm}', [BbmController::class, 'update'])->name('bbm.update');
Route::delete('/bbm/{bbm}', [BbmController::class, 'destroy'])->name('bbm.destroy');

Route::post('/supply/store', [SuppController::class, 'store'])->name('supply.store');

Route::post('/transactions/store', [TransaksiController::class, 'store'])->name('transactions.store');
