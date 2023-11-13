<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'haqiqi123@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'haqiqi@gmail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2,
        ]);

    }
}
