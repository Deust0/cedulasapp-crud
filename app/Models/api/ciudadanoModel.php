<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Model;

class ciudadanoModel extends Model
{
    protected $table = 'info_usuarios'; //info_usuarios es el nombre de la tabla de la base de datos
    protected $fillable = [
        'cedula',
        'name',
        'edad',
        'ciudad',
        'nacimiento',
        'estadocivil'
    ];
}
