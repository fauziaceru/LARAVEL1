@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
<x-page-title description="Latihan request POST dan CSRF">
    Tambah Kategori
</x-page-title>

<form method="POST" action="{{ route('kategori.store') }}">
    @csrf
    <label for="nama">Nama kategori</label>
    <input id="nama" name="nama" value="{{ old('nama') }}">
    @error('nama')
        <div class="error">{{ $message }}</div>
    @enderror

    <label for="jenis">Jenis</label>
    <select id="jenis" name="jenis">
        <option value="">Pilih jenis</option>
        <option value="Pemasukan" @selected(old('jenis') === 'Pemasukan')>Pemasukan</option>
        <option value="Pengeluaran" @selected(old('jenis') === 'Pengeluaran')>Pengeluaran</option>
    </select>
    @error('jenis')
        <div class="error">{{ $message }}</div>
    @enderror

    <button type="submit">Kirim</button>
</form>
@endsection