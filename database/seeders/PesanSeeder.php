<?php

namespace Database\Seeders;

use App\Models\Pesan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pesans = [
            [
                'nomor_pesan' => 'PES001',
                'pelanggan' => 'Budi Santoso',
                'no_meja' => 1,
                'catatan' => 'Sate Ayam - 5 porsi
Sate Kambing - 3 porsi
Perkedel - 2 porsi',
                'total' => 185000,
                'status' => 'selesai',
            ],
            [
                'nomor_pesan' => 'PES002',
                'pelanggan' => 'Siti Nurhaliza',
                'no_meja' => 3,
                'catatan' => 'Sate Sapi - 4 porsi
Nasi Kuning - 4 piring
Es Teh - 4 gelas',
                'total' => 220000,
                'status' => 'diproses',
            ],
            [
                'nomor_pesan' => 'PES003',
                'pelanggan' => 'Ahmad Wijaya',
                'no_meja' => 5,
                'catatan' => 'Sate Kambing - 6 porsi
Lumpia - 2 porsi
Sambal - 1 piring',
                'total' => 280000,
                'status' => 'pending',
            ],
            [
                'nomor_pesan' => 'PES004',
                'pelanggan' => 'Rini Handoko',
                'no_meja' => 2,
                'catatan' => 'Sate Ayam - 2 porsi
Sate Kambing - 2 porsi',
                'total' => 120000,
                'status' => 'selesai',
            ],
            [
                'nomor_pesan' => 'PES005',
                'pelanggan' => 'Eko Prasetyo',
                'no_meja' => null,
                'catatan' => 'Pesan Bungkus:
Sate Ayam - 10 porsi
Sate Sapi - 5 porsi',
                'total' => 350000,
                'status' => 'dibatalkan',
            ],
        ];

        foreach ($pesans as $pesan) {
            Pesan::create($pesan);
        }
    }
}
