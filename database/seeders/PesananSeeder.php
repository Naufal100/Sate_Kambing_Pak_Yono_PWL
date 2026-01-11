<?php

namespace Database\Seeders;

use App\Models\Pesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pesananList = [
            [
                'nama_pelanggan' => 'Ahmad Wijaya',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta Pusat',
                'total_harga' => 150000,
                'status' => 'selesai',
                'catatan' => 'Pesanan sudah diambil',
            ],
            [
                'nama_pelanggan' => 'Siti Nurhayati',
                'no_hp' => '082345678901',
                'alamat' => 'Jl. Sudirman No. 456, Jakarta Selatan',
                'total_harga' => 200000,
                'status' => 'diproses',
                'catatan' => 'Jangan terlalu pedas',
            ],
            [
                'nama_pelanggan' => 'Budi Santoso',
                'no_hp' => '083456789012',
                'alamat' => 'Jl. Ahmad Yani No. 789, Bandung',
                'total_harga' => 175000,
                'status' => 'pending',
                'catatan' => null,
            ],
            [
                'nama_pelanggan' => 'Rina Cahyani',
                'no_hp' => '084567890123',
                'alamat' => 'Jl. Gatot Subroto No. 321, Jakarta Timur',
                'total_harga' => 225000,
                'status' => 'selesai',
                'catatan' => 'Terima kasih, lezat sekali',
            ],
            [
                'nama_pelanggan' => 'Doni Hermawan',
                'no_hp' => '085678901234',
                'alamat' => 'Jl. Diponegoro No. 654, Surabaya',
                'total_harga' => 125000,
                'status' => 'diproses',
                'catatan' => 'Tanya tentang varian daging sapi',
            ],
            [
                'nama_pelanggan' => 'Nur Azizah',
                'no_hp' => '086789012345',
                'alamat' => 'Jl. Imam Bonjol No. 987, Medan',
                'total_harga' => 300000,
                'status' => 'pending',
                'catatan' => 'Pesanan untuk acara ulang tahun',
            ],
            [
                'nama_pelanggan' => 'Rinto Simbolon',
                'no_hp' => '087890123456',
                'alamat' => 'Jl. Pemuda No. 111, Yogyakarta',
                'total_harga' => 185000,
                'status' => 'selesai',
                'catatan' => 'Pesan ulang bulan depan',
            ],
            [
                'nama_pelanggan' => 'Lina Kusuma',
                'no_hp' => '088901234567',
                'alamat' => 'Jl. Kartini No. 222, Semarang',
                'total_harga' => 165000,
                'status' => 'dibatalkan',
                'catatan' => 'Batalkan karena ada keperluan mendadak',
            ],
            [
                'nama_pelanggan' => 'Hendra Gunawan',
                'no_hp' => '089012345678',
                'alamat' => 'Jl. Veteran No. 333, Makassar',
                'total_harga' => 210000,
                'status' => 'pending',
                'catatan' => 'Permintaan special: extra bumbu',
            ],
            [
                'nama_pelanggan' => 'Maya Puspita',
                'no_hp' => '080123456789',
                'alamat' => 'Jl. Raden Intan No. 444, Lampung',
                'total_harga' => 195000,
                'status' => 'diproses',
                'catatan' => null,
            ],
        ];

        // Insert data pesanan
        foreach ($pesananList as $pesanan) {
            Pesanan::create($pesanan);
        }
    }
}
