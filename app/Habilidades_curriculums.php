<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidades_curriculums extends Model
{
    protected $table = 'habilidades_curriculums';
    protected $fillable = ['curriculum_id','habilidad_id','estatus'];

    public function curriculums(){
    	return $this->belongsTo('App\Curriculums','curriculum_id','id');
    }

    public function habilidades(){
    	return $this->belongsTo('App\Habilidades','habilidad_id','id');
    }
}
