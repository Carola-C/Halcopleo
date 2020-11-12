<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_ofertas extends Model
{
    protected $table = 'tipos_ofertas';
    protected $fillable = ['nombre','estatus'];
}
