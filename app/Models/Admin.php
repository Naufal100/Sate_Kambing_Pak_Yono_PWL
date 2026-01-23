<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';

    protected $primaryKey = 'id_admin';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id_admin',
        'username',
        'password',
        'no_hp',
        'email',
    ];

    protected $hidden = [
        'password',
    ];
}
