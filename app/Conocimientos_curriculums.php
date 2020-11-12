<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conocimientos_curriculums extends Model
{
    protected $table = 'conocimientos_curriculums';
    protected $fillable = ['curriculum_id','conocimiento_id','estatus'];

    public function curriculums(){
    	return $this->belongsTo('App\Curriculums','curriculum_id','id');
    }

    public function conocimientos(){
    	return $this->belongsTo('App\Conocimientos','conocimiento_id','id');
    }
    
}
