<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guias_favoritas extends Model
{
    protected $table = 'guias_favoritas';
    protected $fillable = ['candidato_id','guia_id','estatus'];

    public function users(){
    	return $this->belongsTo('App\Users','candidato_id','id');
    }

    public function guias(){
    	return $this->belongsTo('App\Guias','guia_id','id');
    }
}
