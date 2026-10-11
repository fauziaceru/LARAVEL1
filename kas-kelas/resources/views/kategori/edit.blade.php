@extends('layouts.app') 
@section('title', 'Ubah Kategori') 
@section('content') 
<h1>Ubah Kategori</h1> 
<form method="POST" action="{{ route('kategori.update', $kategori) }}"> 
    @method('PUT') 
    @include('kategori._form') 
    <button type="submit">Perbarui</button> 
</form> 
@endsection 