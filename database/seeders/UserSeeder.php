<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat User Admin
        User::create([
            'nama_lengkap' => 'Administrator',
            'username'     => 'admin',
            'password'     => Hash::make('password'), // ganti dengan password aman
            'role'         => 'admin',
        ]);

        // Membuat User Guru
        User::create([
            'nama_lengkap' => 'Budi Santoso',
            'username'     => 'guru_budi',
            'password'     => Hash::make('password'), // ganti dengan password aman
            'role'         => 'guru',
        ]);
    }
}
