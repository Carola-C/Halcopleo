<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
	protected $table = 'users';
    protected $fillable = ['nombre','sexo','ap_pat','ap_mat','telefono','fecha_nac','email','password','entidad_id','municipio_id','colonia','calle','no_casa','foto_ruta','cp','tipo_usuario_id','estatus'];

    public function entidades(){
    	return $this->belongsTo('App\Entidades','entidad_id','id');
    }

    public function municipios(){
    	return $this->belongsTo('App\Municipios','municipio_id','id');
    }

    public function tipos_usuarios(){
    	return $this->belongsTo('App\Tipos_usuarios','tipo_usuario_id','id');
    }

    

}
