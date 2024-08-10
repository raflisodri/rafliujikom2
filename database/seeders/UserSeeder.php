<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
            'remember_token' => Str::random(10),
        ]);
    }
}
