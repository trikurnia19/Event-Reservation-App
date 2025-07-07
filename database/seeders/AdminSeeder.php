<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('email', 'admin@demo.com')->exists()) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@demo.com',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]);
        }
    }
}

