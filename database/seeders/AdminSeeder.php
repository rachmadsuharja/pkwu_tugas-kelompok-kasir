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
            'shift' => 'Pagi/06:00-14:00',
        ]);

        User::create([
            'nama'=> 'Programmer',
            'username'=> 'programmer',
            'password'=> Hash::make('programmer123'),
            'shift' => 'Sore/14:00-23:00',
        ]);
    }
}
