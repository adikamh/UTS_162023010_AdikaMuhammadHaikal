<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\products::create([
            'users_id' => 1,
            'name_produk' => 'Laptop',
            'kode_produk' => 'LP001',
            'stock' => 10,
            'harga' => 1500.00,
        ]);
    }
}
