<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_usuarios extends Model
{
    protected $table = 'tipos_usuarios';
    protected $fillable = ['nombre','estatus'];
}
