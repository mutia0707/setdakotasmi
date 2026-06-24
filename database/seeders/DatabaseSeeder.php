<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Admin
    User::factory()->create([
        'name'     => 'Admin',
        'email'    => 'admin@gmail.com',
        'password' => bcrypt('password123'),
        'role'     => 'admin', // sesuaikan dengan kolom di tabel users kamu
    ]);

    // Staff
    User::factory()->create([
        'name'     => 'Staff',
        'email'    => 'staff@gmail.com',
        'password' => bcrypt('password123'),
        'role'     => 'staff',
    ]);
}
}