<?php

namespace Database\Factories;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
        'kode' => fake()->unique()->bothify('KAT-##'), 
        'nama' => fake()->words(2, true), 
        'jenis' => fake()->randomElement(['Pemasukan', 'Pengeluaran']), 
        ];
    }
}
