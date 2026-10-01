<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('kategori')->name('kategori.')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('index');
    Route::get('/tambah', [KategoriController::class, 'create'])->name('create');
    Route::post('/', [KategoriController::class, 'store'])->name('store');
});