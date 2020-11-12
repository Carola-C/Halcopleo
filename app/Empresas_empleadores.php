<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas_empleadores extends Model
{
    protected $table = 'empresas_empleadores';
    protected $fillable = ['empresa_id','empleador_id','estatus'];

    public function empresas(){
    	return $this->belongsTo('App\Empresas','empresa_id','id');
    }

    public function users(){
    	return $this->belongsTo('App\Users','empleador_id','id');
    }
    
}
