<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table = 'empresas';
    protected $fillable = ['razon_social','rfc','entidad_id','municipio_id','foto_ruta','colonia','calle','no_edificio','cp','estatus'];

    public function entidades(){
    	return $this->belongsTo('App\Entidades','entidad_id','id');
    }

    public function municipios(){
    	return $this->belongsTo('App\Municipios','municipio_id','id');
    }
    
}
