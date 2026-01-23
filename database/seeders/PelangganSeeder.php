<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        Pelanggan::create([
            'username' => 'budi_santoso',
            'email_pelanggan' => 'budi@gmail.com',
            'password' => 'budi123',
            'no_tlp' => '081299998888',
        ]);
    }
}
