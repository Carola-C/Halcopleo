<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulaciones extends Model
{
    protected $table = 'postulaciones';
    protected $fillable = ['candidato_id','oferta_id','estado','estatus'];

    public function users(){
    	return $this->belongsTo('App\Users','candidato_id','id');
    }

    public function ofertas(){
    	return $this->belongsTo('App\Ofertas','oferta_id','id');
    }

    public function entidades(){
    	return $this->belongsTo('App\Entidades','entidad_id','id');
    }

    public function municipios(){
    	return $this->belongsTo('App\Municipios','municipio_id','id');
    }
    
}
