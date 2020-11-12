<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculums extends Model
{

	protected $table = 'curriculums';
    protected $fillable = ['candidato_id','foto_ruta','grado_max_id','nombre_escuela','descripcion_candidato','estatus'];

    public function users(){
    	return $this->belongsTo('App\Users','candidato_id','id');
    }

    public function grados_max_estudios(){
    	return $this->belongsTo('App\Grados_max_estudios','grado_max_id','id');
    }
    public function curri_cono(){
    	return $this->belongsToMany('App\Conocimientos','conocimientos_curriculums','curriculum_id');
    }
}
