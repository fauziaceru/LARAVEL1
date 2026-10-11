@extends('layouts.app')
@section('title', 'Daftar Akun')
@section('content') 
<h1>Daftar Akun</h1>
<form method="GET"><input name="search" value="{{ request('search') }}" placeholder="Cari nama akun"><button>Cari</button></form>
<p><a href="{{ route('akun.create') }}">Tambah akun</a></p>
<table>
    <tr><th>Kode</th><th>Nama</th><th>Saldo awal</th><th>Aksi</th></tr>
    @forelse($akun as $item)
    <tr>
        <td>{{ $item->kode }}</td>
        <td>{{ $item->nama }}</td>
        <td>Rp {{ number_format($item->saldo_awal, 2, ',', '.') }}</td>
        <td>
            <a href="{{ route('akun.edit', $item) }}">Ubah</a>
            <form method="POST" action="{{ route('akun.destroy', $item) }}" style="display: inline" onsubmit="return confirm('Hapus akun ini?')">
                @csrf @method('DELETE')<button>Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr><td colspan="4">Belum ada akun.</td></tr>
    @endforelse
</table>
{{ $akun->links() }}
@endsection