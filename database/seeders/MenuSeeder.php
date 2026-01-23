<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder {
    public function run(): void {
        Menu::firstOrCreate(['id_menu' => 'MN01'], [
            'nama_menu' => 'Sate Kambing', 'kategori' => 'makanan',
            'harga' => 50000, 'stok' => 50, 'deskripsi_menu' => 'Sate empuk', 'foto_menu' => 'sate.jpg'
        ]);
        Menu::firstOrCreate(['id_menu' => 'MN02'], [
            'nama_menu' => 'Es Jeruk', 'kategori' => 'minuman',
            'harga' => 5000, 'stok' => 100, 'deskripsi_menu' => 'Segar', 'foto_menu' => 'jeruk.jpg'
        ]);
    }
}
 