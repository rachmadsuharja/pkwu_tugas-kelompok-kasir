<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'nama_menu' => 'Sweet Tea',
            'id_kategori' => 1,
            'harga' => 5000,
            'status' => 'Tersedia'
        ]);
        Menu::create([
            'nama_menu' => 'Sweet Tea',
            'id_kategori' => 2,
            'harga' => 5000,
            'status' => 'Tersedia'
        ]);
        Menu::create([
            'nama_menu' => 'Expresso',
            'id_kategori' => 1,
            'harga' => 8000,
            'status' => 'Tersedia'
        ]);
        Menu::create([
            'nama_menu' => 'Expresso',
            'id_kategori' => 2,
            'harga' => 8000,
            'status' => 'Tersedia'
        ]);
        Menu::create([
            'nama_menu' => 'Indomie Goreng',
            'id_kategori' => 3,
            'harga' => 8000,
            'status' => 'Tersedia'
        ]);
    }
}
