<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
	protected $table = 'habilidades';
    protected $fillable = ['nombre','estatus'];
    
}
