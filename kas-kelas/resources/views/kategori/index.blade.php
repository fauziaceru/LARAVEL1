@extends('layouts.app') 
@section('title', 'Daftar Kategori') 
@section('content') 
<h1>Daftar Kategori</h1> 
@if (session('success'))<p class="success">{{ session('success') }}</p>@endif 
@if (session('error'))<p class="error">{{ session('error') }}</p>@endif 
<form method="GET" action="{{ route('kategori.index') }}"> 
    <input name="search" value="{{ request('search') }}" placeholder="Cari nama kategori"> 
    <button type="submit">Cari</button> 
</form> 
<p><a href="{{ route('kategori.create') }}">Tambah kategori</a></p> 
<table><tr><th>Kode</th><th>Nama</th><th>Jenis</th><th>Aksi</th></tr> 
@forelse ($kategori as $item) 
<tr><td>{{ $item->kode }}</td><td>{{ $item->nama }}</td><td>{{ $item->jenis }}</td><td> 
<a href="{{ route('kategori.edit', $item) }}">Ubah</a> 
<form method="POST" action="{{ route('kategori.destroy', $item) }}" style="display:inline" onsubmit="
return confirm('Hapus kategori ini?')">@csrf @method('DELETE')<button>Hapus</button></form> 
</td></tr> 
@empty<tr><td colspan="4">Belum ada kategori.</td></tr>@endforelse 
</table> 
{{ $kategori->links() }} 
@endsection