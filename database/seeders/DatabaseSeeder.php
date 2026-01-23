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
        // User::factory(10)->create();

        // Buat user test jika belum ada (menghindari duplicate saat seeding berulang)
        \App\Models\User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            \Database\Seeders\AdminSeeder::class,
            \Database\Seeders\PelangganSeeder::class,
            \Database\Seeders\MenuSeeder::class,
            \Database\Seeders\PesananSeeder::class,
        ]);
    }
}
