<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    protected $table = 'entidades';
    protected $fillable = ['clave_pais','nombre','estatus'];
}
