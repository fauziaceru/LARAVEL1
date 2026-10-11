@extends('layouts.app') 
@section('title', 'Ubah Akun') 

@section('content')
<h1>Ubah Akun</h1>

<form method="POST" action="{{ route('akun.update', $akun) }}">
    @method('PUT')
    @include('akun._form')
    <button type="submit">Perbarui</button>
</form>
@endsection