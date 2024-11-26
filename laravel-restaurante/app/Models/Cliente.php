<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable =  [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'email'
    ];
}
