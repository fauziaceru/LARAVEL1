@extends('layouts.app') 
@section('title', 'Tambah Kategori') 
@section('content') 
<h1>Tambah Kategori</h1> 
<form method="POST" action="{{ route('kategori.store') }}"> 
    @include('kategori._form') 
    <button type="submit">Simpan</button> 
</form> 
@endsection 