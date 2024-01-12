<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Rachmad Suharja',
                'username'=> 'rachmadsuharja',
                'password' => Hash::make('harja123'),
                'shift' => 'Pagi/06:00-14:00',
            ], [
                'nama' => 'Rosa',
                'username'=> 'rosa',
                'password' => Hash::make('rosa123'),
                'shift' => 'Pagi/06:00-14:00',
            ], [
                'nama' => 'Fisa',
                'username' => 'fisa',
                'password' => Hash::make('fisa123'),
                'shift' => 'Pagi/06:00-14:00',
            ],
        ]);
    }
}
