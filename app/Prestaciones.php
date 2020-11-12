<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestaciones extends Model
{
	protected $table = 'prestaciones';
    protected $fillable = ['nombre','descripcion','estatus'];
    
}
