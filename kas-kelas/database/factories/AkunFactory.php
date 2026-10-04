<?php

namespace Database\Factories;

use App\Models\Akun;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Akun>
 */
class AkunFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
        'kode' => fake()->unique()->bothify('AK-###'), 
        'nama' => fake()->randomElement(['Kas Kelas', 'Bank Kelas']), 
        'saldo_awal' => fake()->randomFloat(2, 0, 1000000), 
        ];
    }
}
