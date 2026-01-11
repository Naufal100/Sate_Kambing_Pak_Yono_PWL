<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert admin jika belum ada (hindari duplicate saat seeding ulang)
        Admin::firstOrCreate([
            'id_admin' => 'ADM001'
        ],[
            'username' => 'admin',
            'password' => 'admin123',
            'no_hp' => '081234567890',
        ]);

        Admin::firstOrCreate([
            'id_admin' => 'ADM002'
        ],[
            'username' => 'manager',
            'password' => 'manager123',
            'no_hp' => '081234567891',
        ]);
    }
}
