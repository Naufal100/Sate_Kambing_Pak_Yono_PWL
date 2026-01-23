<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model {
    protected $table = 'detail_pesanan';
    protected $fillable = ['pesanan_id', 'id_menu', 'qty', 'harga_satuan', 'subtotal'];

    public function menu() { return $this->belongsTo(Menu::class, 'id_menu', 'id_menu'); }
}
