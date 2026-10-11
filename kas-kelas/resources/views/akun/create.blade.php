@extends('layouts.app') 
@section('title', 'Tambah Akun')

@section('content')
<h1>Tambah Akun</h1>
<form method="POST" action="{{ route('akun.store') }}">
    @include('akun._form')
    <button type="submit">Simpan</button>
</form>
@endsection