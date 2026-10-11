<?php

use App\Http\Controllers\AkunController; 
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\KategoriController; 
use App\Http\Controllers\TransaksiController; 
use Illuminate\Support\Facades\Route; 

Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); 
Route::resource('kategori', KategoriController::class) ->parameters(['kategori' => 'kategori']) ->names('kategori'); 
Route::resource('akun', AkunController::class) ->parameters(['akun' => 'akun']) ->names('akun'); 
Route::get('/transaksi', [TransaksiController::class, 'index']) ->name('transaksi.index');