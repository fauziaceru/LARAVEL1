@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
<x-page-title description="Data sementara dari controller">
    Daftar Kategori
</x-page-title>

@if (session('success'))
    <p class="success">{{ session('success') }}</p>
@endif

@if (count($kategori) > 0)
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $item)
            <tr>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jenis }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>Belum ada kategori.</p>
@endif
@endsection