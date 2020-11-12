<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencias_curriculums extends Model
{
    protected $table = 'experiencias_curriculums';
    protected $fillable = ['curriculum_id','experiencia_id','estatus'];

    public function curriculums(){
    	return $this->belongsTo('App\Curriculums','curriculum_id','id');
    }

    public function experiencias(){
    	return $this->belongsTo('App\Experiencias','experiencia_id','id');
    }
}
