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
                'nama_menu' => 'Dimsum',
                'id_kategori' => 1,
                'harga' => 2000,
                'status' => 'Tersedia'
            ], [
                'nama_menu' => 'Es Jagung',
                'id_kategori' => 2,
                'harga' => 6000,
                'status' => 'Tersedia'
            ], [
                'nama_menu' => 'Brownies',
                'id_kategori' => 1,
                'harga' => 5000,
                'status' => 'Tersedia'
            ]
        ]);
    }
}
