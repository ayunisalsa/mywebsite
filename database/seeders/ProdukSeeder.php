<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert 5 dummy data
        \App\Models\Produk::factory()->create([
            'wilayah_id' => rand(1, 10),
            'nama' => 'Produk 1',
            'slug' => 'produk_1',
            'gambar' => 'bakpia-jogja.jpg',
        ]);
        \App\Models\Produk::factory()->create([
            'wilayah_id' => rand(1, 10),
            'nama' => 'Produk 2',
            'slug' => 'produk_2',
            'gambar' => 'banana-crispy.jpg',
        ]);
        \App\Models\Produk::factory()->create([
            'wilayah_id' => rand(1, 10),
            'nama' => 'Produk 3',
            'slug' => 'produk_3',
            'gambar' => 'bolen-bandung.jpg',
        ]);
        \App\Models\Produk::factory()->create([
            'wilayah_id' => rand(1, 10),
            'nama' => 'Produk 4',
            'slug' => 'produk_4',
            'gambar' => 'geplak.jpg',
        ]);
        \App\Models\Produk::factory()->create([
            'wilayah_id' => rand(1, 10),
            'nama' => 'Produk 5',
            'slug' => 'produk_5',
            'gambar' => 'gudeg-kaleng.jpg',
        ]);

        // insert 18 random data
        for ($i = 0; $i < 18; $i++) {
            \App\Models\Produk::factory()->create([
                'wilayah_id' => rand(1, 10),
            ]);
        }
    }
}
