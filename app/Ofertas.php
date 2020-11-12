<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ofertas extends Model
{
    protected $table = 'ofertas';
    protected $fillable = ['empresa_id','tipo_oferta_id','nombre','tiempo','salario','descripcion','calle','no_edificio','cp','colonia','entidad_id','municipio_id','estatus'];

    public function empresas(){
        return $this->belongsTo('App\Empresas','empresa_id','id');
    }

    public function tipos_ofertas(){
    	return $this->belongsTo('App\Tipos_ofertas','tipo_oferta_id','id');
    }

    public function entidades(){
    	return $this->belongsTo('App\Entidades','entidad_id','id');
    }

    public function municipios(){
    	return $this->belongsTo('App\Municipios','municipio_id','id');
    }
    
}
