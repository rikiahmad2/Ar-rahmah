<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'doLogin']);
});
Route::get('/logout', [AuthController::class, 'doLogout'])->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    // pages
    Route::get('/', [PagesController::class, 'getIndex']);
    Route::get('/dashboard-keuangan', [PagesController::class, 'getIndexUser']);

    // anggota
    Route::resource('anggota', AnggotaController::class);

    // setor
    Route::resource('setor', SetorController::class)->except('edit');

    // transaksi
    Route::group(['prefix' => 'transaksi'], function () {
        Route::get('/', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/{id_angsuran}/create', [TransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/store', [TransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
        Route::get('/destroy/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
    });
});
