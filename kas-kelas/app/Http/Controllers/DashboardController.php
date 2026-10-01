<?php
namespace App\Http\Controllers;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'jumlahKategori' => 3,
            'saldoKas' => 750000,
        ]);
    }
}