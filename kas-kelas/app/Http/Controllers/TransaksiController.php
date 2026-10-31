<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    public function index(): View
    {
        $transaksi = Transaksi::with(['akun', 'kategori'])->latest()->get();

        return view('transaksi.index', compact('transaksi'));
    }
}