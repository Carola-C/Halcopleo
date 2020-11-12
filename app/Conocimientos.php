<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conocimientos extends Model
{
    protected $table = 'conocimientos';
    protected $fillable = ['nombre','estatus'];

    
}
