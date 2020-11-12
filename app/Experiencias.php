<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencias extends Model
{

	protected $table = 'experiencias';
    protected $fillable = ['nombre_lugar','tiempo_inicio','tiempo_fin','pais_id','ciudad','cargo','descripcion','estatus'];

    public function paises(){
    	return $this->belongsTo('App\Paises','pais_id','id');
    }
    
}
