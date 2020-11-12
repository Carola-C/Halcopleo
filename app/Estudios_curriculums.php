<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudios_curriculums extends Model
{
    protected $table = 'estudios_curriculums';
    protected $fillable = ['curriculum_id','estudio_id','estatus'];

    public function curriculums(){
    	return $this->belongsTo('App\Curriculums','curriculum_id','id');
    }

    public function estudios(){
    	return $this->belongsTo('App\Estudios','estudio_id','id');
    }
    
}
