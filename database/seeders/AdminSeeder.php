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
        
        Admin::firstOrCreate([
            'id_admin' => '1'
        ],[
            'username' => 'reyhan admin',
            'password' => 'reyhan123',
            'no_hp' => '081234567890',
        ]);

        Admin::firstOrCreate([
            'id_admin' => '2'
        ],[
            'username' => 'nizar admin',
            'password' => 'nizar123',
            'no_hp' => '081234567891',
        ]);

        Admin::firstOrCreate([
            'id_admin' => '3'
        ],[
            'username' => 'admin',
            'password' => 'admin',
            'no_hp' => '081999567890',
        ]);
    }
}
