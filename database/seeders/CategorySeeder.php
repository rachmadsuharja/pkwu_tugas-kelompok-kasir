<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'nama_kategori' => 'Cold Drink'
        ]);
        Category::create([
            'nama_kategori' => 'Hot Drink'
        ]);
        Category::create([
            'nama_kategori' => 'Meal'
        ]);
        Category::create([
            'nama_kategori' => 'Snack'
        ]);
    }
}
