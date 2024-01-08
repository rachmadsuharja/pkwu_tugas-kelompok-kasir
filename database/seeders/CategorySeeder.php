<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'nama_kategori' => 'Coffee',
            ], [
                'nama_kategori' => 'Breads',
            ], [
                'nama_kategori' => 'Snacks',
            ]
        ]);
    }
}
