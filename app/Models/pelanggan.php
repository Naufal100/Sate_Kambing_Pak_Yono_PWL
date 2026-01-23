<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_user'; // Sesuai permintaan

    protected $fillable = [
        'username',
        'email_pelanggan',
        'password',
        'no_tlp',
    ];

    protected $hidden = [
        'password',
    ];
}
