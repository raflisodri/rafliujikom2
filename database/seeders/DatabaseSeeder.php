<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'foto' => 'default.jpg', // Sesuaikan dengan path gambar default
            'username' => 'admin',
            'password' => Hash::make('admin'), // Ganti 'password' dengan password yang aman
            'level' => 'admin',
            // 'remember_token' => Str::random(10),
        ]);
    }
}
