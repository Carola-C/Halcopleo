<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{
	protected $table = 'estudios';
    protected $fillable = ['fecha_inicio','fecha_fin','titulo','nombre_escuela','ciudad','pais_id','estatus'];

    public function paises(){
    	return $this->belongsTo('App\Paises','pais_id','id');
    }

    
}
