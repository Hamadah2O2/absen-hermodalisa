<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'adminrs',
            'password' => bcrypt('12345678'),
        ]);

        $dokter = User::create([
            'name' => 'dokter',
            'email' => 'dokter@gmail.com',
            'username' => 'masdokter',
            'password' => bcrypt('12345678'),
        ]);

        $perawat = User::create([
            'name' => 'perawat',
            'email' => 'perawat@gmail.com',
            'username' => 'perawat',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');
        $dokter->assignRole('dokter');
    }
}
