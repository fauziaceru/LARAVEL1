<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\View\View;

public function index(): View
{
    $kategori = Kategori::query()
        ->orderBy('nama')
        ->get();

    return view('kategori.index', compact('kategori'));
}