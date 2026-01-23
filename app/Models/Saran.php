<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    use HasFactory;

    protected $table = 'saran';
    protected $primaryKey = 'id_saran';
    protected $fillable = ['id_user', 'isi'];

    // Relasi ke tabel Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_user', 'id_user');
    }
}
