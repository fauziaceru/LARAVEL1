<?php

namespace Database\Factories;

use App\Models\Akun;     
use App\Models\Kategori; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kategori_id' => Kategori::factory(),
            'akun_id' => Akun::factory(),
            'tanggal' => fake()->dateTimeBetween('-3 months', 'now'),
            'jumlah' => fake()->randomFloat(2, 10000, 500000),
            'keterangan' => fake()->sentence(),
        ];
    }
}