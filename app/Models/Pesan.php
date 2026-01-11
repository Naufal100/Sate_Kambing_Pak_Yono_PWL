<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesans';

    protected $fillable = [
        'nomor_pesan',
        'pelanggan',
        'no_meja',
        'catatan',
        'total',
        'status',
    ];
}
