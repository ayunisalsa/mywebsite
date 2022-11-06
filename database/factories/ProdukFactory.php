<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nama = fake()->word();

        return [
            // 'wilayah_id' => \App\Models\Wilayah::factory(),
            // 'user_id' => \App\Models\User::factory(),
            'nama' => $nama,
            'slug' => Str::slug($nama, '_'),
            'gambar' => 'https://picsum.photos/id/'. rand(1, 1000) .'/1000',
            'harga' => fake()->numberBetween(1000, 100000),
            'deskripsi' => fake()->text(),
            'verified' => true,
        ];
    }
}