@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<x-page-title description="Ringkasan kas kelas tanpa database">
    Dashboard
</x-page-title>

<p>Jumlah kategori: {{ $jumlahKategori }}</p>
<p>Saldo kas: Rp {{ number_format($saldoKas, 0, ',', '.') }}</p>
@endsection