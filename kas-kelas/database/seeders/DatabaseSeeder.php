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
        // --- KATEGORI ---
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

        // [SOAL 4] Tambah minimal 1 kategori baru di sini
        $tabungan = Kategori::create([
            'kode'  => 'TABUNGAN',
            'nama'  => 'Tabungan Kelas',
            'jenis' => 'Pemasukan',
        ]);


        // --- AKUN ---
        $akun = Akun::create([
            'kode' => 'KAS',
            'nama' => 'Kas Kelas',
            'saldo_awal' => 0,
        ]);

        // [SOAL 4] Tambah minimal 1 akun baru di sini
        $bank = Akun::create([
            'kode'       => 'BANK',
            'nama'       => 'Bank Mandiri',
            'saldo_awal' => 500000,
        ]);


        // --- TRANSAKSI ---
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