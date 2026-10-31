<?php

namespace Database\Seeders;

use App\Models\Akun;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $masuk = Kategori::create([
            'kode' => 'IURAN',
            'nama' => 'Iuran Anggota',
            'jenis' => 'Pemasukan',
        ]);

        $keluar = Kategori::create([
            'kode' => 'ATK',
            'nama' => 'Alat Tulis',
            'jenis' => 'Pengeluaran',
        ]);

        $akun = Akun::create([
            'kode' => 'KAS',
            'nama' => 'Kas Kelas',
            'saldo_awal' => 0,
        ]);

        Transaksi::factory(10)->create([
            'akun_id' => $akun->id,
            'kategori_id' => $masuk->id,
        ]);

        Transaksi::factory(5)->create([
            'akun_id' => $akun->id,
            'kategori_id' => $keluar->id,
        ]);
    }
}