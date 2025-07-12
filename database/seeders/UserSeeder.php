<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('12345678'),
            'role'       => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'merchant',
            'password' => Hash::make('12345678'),
            'role'       => 'merchant',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
