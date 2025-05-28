<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Jalankan seeder
        $this->call([
            GuruSeeder::class,
            SiswaSeeder::class,
        ]);

        // Buat 1 user dummy manual
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}