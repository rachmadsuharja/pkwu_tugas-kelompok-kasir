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
            'username'=> 'harja',
            'password' => Hash::make('harja123'),
        ]);

        User::create([
            'nama'=> 'Rohan Dwi Cahyono',
            'username'=> 'rohan',
            'password'=> Hash::make('123456'),
        ]);
    }
}
