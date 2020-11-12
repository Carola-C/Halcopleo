<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipios';
    protected $fillable = ['entidad_id','nombre','estatus'];

    public function entidades(){
    	return $this->belongsTo('App\Entidades','entidad_id','id');
    }
}
