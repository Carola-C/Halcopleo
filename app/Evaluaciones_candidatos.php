<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluaciones_candidatos extends Model
{
    protected $table = 'evaluaciones_candidatos';
    protected $fillable = ['postulacion_id','calificacion','comentario','estatus'];

    public function postulaciones(){
    	return $this->belongsTo('App\Postulaciones','postulacion_id','id');
    }

    
    
}
