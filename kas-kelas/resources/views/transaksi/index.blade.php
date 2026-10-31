@extends('layouts.app')
@section('title', 'Daftar Transaksi')
@section('content')
    <x-page-title description="Data dari database PostgreSQL">
        Daftar Transaksi
    </x-page-title>

    @if (count($transaksi) > 0)
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Akun</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                    <tr>
                        <td>{{ $item->tanggal->format('d/m/Y') }}</td>
                        <td>{{ $item->kategori->nama }}</td>
                        <td>{{ $item->akun->nama }}</td>
                        <td>{{ number_format((float) $item->jumlah, 2, ',', '.') }}</td>
                        <td>{{ $item->keterangan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada transaksi.</p>
    @endif
@endsection