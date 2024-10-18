<?php

use App\Http\Controllers\BbmController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [BbmController::class, 'index']);
Route::get('/bbm/create', [BbmController::class, 'create']);
Route::post('/bbm/store', [BbmController::class, 'store']);
Route::get('/bbm/{bbm}', [BbmController::class, 'show']);
Route::get('/bbm/{kd_bbm}/edit', [BbmController::class, 'edit'])->name('bbm.edit');
Route::put('/bbm/{kd_bbm}', [BbmController::class, 'update'])->name('bbm.update');
Route::delete('/bbm/{bbm}', [BbmController::class, 'destroy'])->name('bbm.destroy');
