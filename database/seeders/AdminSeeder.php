<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Rachmad Suharja',
            'username'=> 'rachmadsuharja',
            'password' => Hash::make('harja123'),
            'shift' => 'Siang/06:00-18:00',
        ]);

        User::create([
            'nama'=> 'Rohan Dwi Cahyono',
            'username'=> 'rohandc',
            'password'=> Hash::make('123456'),
            'shift' => 'Malam/18:00-06:00',
        ]);

        User::create([
            'nama'=> 'Achmad Rafi',
            'username'=> 'rafifajri',
            'password'=> Hash::make('fhi123'),
            'shift' => 'Malam/18:00-06:00',
        ]);
    }
}
