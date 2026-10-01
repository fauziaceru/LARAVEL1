<?php
namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function index(): View
    {
        $kategori = [
            ['kode' => 'IURAN', 'nama' => 'Iuran Anggota', 'jenis' => 'Pemasukan'],
            ['kode' => 'DONASI', 'nama' => 'Donasi', 'jenis' => 'Pemasukan'],
            ['kode' => 'ATK', 'nama' => 'Alat Tulis', 'jenis' => 'Pengeluaran'],
        ];

        return view('kategori.index', compact('kategori'));
    }

    public function create(): View
    {
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'jenis' => ['required', 'string', 'in:Pemasukan,Pengeluaran'],
        ]);

        return redirect()
            ->route('kategori.index')
            ->with('success', "Kategori {$data['nama']} berhasil diterima.");
    }
}