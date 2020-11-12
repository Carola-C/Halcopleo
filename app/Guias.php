<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guias extends Model
{
	protected $table = 'guias';
    protected $fillable = ['user_id','tipo_guia_id','nombre','descripcion','estatus'];

    public function users(){
    	return $this->belongsTo('App\Users','user_id','id');
    }

    public function tipos_guias(){
    	return $this->belongsTo('App\Tipos_guias','tipo_guia_id','id');
    }
    
}
