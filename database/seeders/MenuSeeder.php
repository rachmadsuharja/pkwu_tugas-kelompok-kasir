<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'nama_menu' => 'Americano',
                'id_kategori' => 1,
                'harga' => 5000,
                'status' => 'Tersedia'
            ], [
                'nama_menu' => 'Iced Cafe Latte',
                'id_kategori' => 1,
                'harga' => 16000,
                'status' => 'Tersedia'
            ], [
                'nama_menu' => 'Matcha Coffe',
                'id_kategori' => 1,
                'harga' => 16000,
                'status' => 'Tersedia'
            ], [
                'nama_menu' => 'Plain Bread',
                'id_kategori' => 2,
                'harga' => 5000,
                'status' => 'Tersedia'
            ], [
                'nama_menu' => 'Chicken Bread',
                'id_kategori' => 2,
                'harga' => 16000,
                'status' => 'Tersedia'
            ], [
                'nama_menu' => 'Beef Bread',
                'id_kategori' => 2,
                'harga' => 16000,
                'status' => 'Tersedia'
            ]
        ]);
    }
}
