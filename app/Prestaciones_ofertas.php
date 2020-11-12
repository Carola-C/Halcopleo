<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestaciones_ofertas extends Model
{
    protected $table = 'prestaciones_ofertas';
    protected $fillable = ['prestacion_id','oferta_id','estatus'];

    public function prestaciones(){
    	return $this->belongsTo('App\Prestaciones','prestacion_id','id');
    }

    public function ofertas(){
    	return $this->belongsTo('App\Ofertas','oferta_id','id');
    }
    
}
