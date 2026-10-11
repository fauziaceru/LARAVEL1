@extends('layouts.app') 
 
@section('title', 'Dashboard') 
 
@section('content') 
<style> 
    .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); ga
p: 1rem; margin: 1rem 0 2rem; } 
    .card { padding: 1rem; border: 1px solid #ddd; border-radius: .6rem; background: #fff; box-shadow
0 2px 8px #00000012; } 
    .card strong { display: block; font-size: 1.35rem; margin-top: .4rem; } 
    .positive { color: #166534; } 
    .negative { color: #b91c1c; } 
</style> 
 
<h1>Dashboard Kas Kelas</h1> 
<div class="dashboard-grid"> 
    <div class="card">Kategori<strong>{{ $jumlahKategori }}</strong></div> 
    <div class="card">Akun<strong>{{ $jumlahAkun }}</strong></div> 
    <div class="card">Transaksi<strong>{{ $jumlahTransaksi }}</strong></div> 
    <div class="card positive">Total pemasukan<strong>Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</strong></div> 
    <div class="card negative">Total pengeluaran<strong>Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}</strong></div> 
    <div class="card">Saldo kas<strong>Rp {{ number_format($saldoKas, 0, ',', '.') }}</strong></div> 
</div> 
 
<h2>Daftar Akun</h2> 
<table> 
    <tr><th>Kode</th><th>Nama</th><th>Saldo awal</th></tr> 
    @forelse ($akun as $item) 
        <tr> 
            <td>{{ $item->kode }}</td> 
            <td>{{ $item->nama }}</td> 
            <td>Rp {{ number_format($item->saldo_awal, 0, ',', '.') }}</td> 
        </tr> 
    @empty 
        <tr><td colspan="3">Belum ada akun.</td></tr> 
    @endforelse 
</table> 
@endsection 