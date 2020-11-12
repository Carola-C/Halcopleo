<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_guias extends Model
{
	protected $table = 'tipos_guias';
    protected $fillable = ['nombre','estatus'];
    
}
