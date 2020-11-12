<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use App\Ofertas;
use App\Postulaciones;
use App\Evaluaciones_candidatos;
use App\Empresas_empleadores;
use App\Guias;
use App\Guias_favoritas;
use App\Users;
use App\Tipos_guias;
use App\Tipos_usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GraficasController extends Controller
{
    public function __construct(){
        $this->middleware('usuarionoRegis');
    }
    public function graficas(){
        $user = Auth::user();
        if ($user->tipo_usuario_id ==1) {
            $ban=1;
            return view('graficas.menu_graficas')->with('ban',$ban);
        }
        if ($user->tipo_usuario_id ==2) {
            $ban=2;
            return view('graficas.menu_graficas')->with('ban',$ban);
        }
    	
    }

    public function grafica_ejemplo1(){
        /*
    	$empresas = Empresas::where('estatus',1)->get();
    	$ofertas = Ofertas::all();
    	$postulaciones = Postulaciones::all();
    	$evaluaciones = Evaluaciones_candidatos::all();
    	$ban = false;
    	return view('graficas.grafica_1')->with('empresas',$empresas)->with('ofertas',$ofertas)->with('postulaciones',$postulaciones)->with('evaluaciones',$evaluaciones)->with('ban',$ban);
        */
        
        $user = Auth::user();
        $empresa = Empresas_empleadores::where('empleador_id',$user->id)->first();
        $ofertas = Ofertas::where('empresa_id',$empresa->empresa_id)->where('estatus',1)->get();
        $postulaciones = Postulaciones::all();
        $evaluaciones =DB::table('evaluaciones_candidatos')->leftJoin('postulaciones','evaluaciones_candidatos.postulacion_id','=','postulaciones.id')->where('evaluaciones_candidatos.estatus',1)->where('postulaciones.estatus',1)->get();

        
        $ban = 0;
        return view('graficas.grafica_1')->with('ofertas',$ofertas)->with('postulaciones',$postulaciones)->with('evaluaciones',$evaluaciones)->with('ban',$ban);
   

    }
    public function grafica_ejemplo2(){
       $user = Auth::user();
        $empresa = Empresas_empleadores::where('empleador_id',$user->id)->first();
        $ofertas = Ofertas::where('empresa_id',$empresa->empresa_id)->where('estatus',0)->get();
        $postulaciones = Postulaciones::all();
        $evaluaciones =DB::table('evaluaciones_candidatos')->leftJoin('postulaciones','evaluaciones_candidatos.postulacion_id','=','postulaciones.id')->where('evaluaciones_candidatos.estatus',1)->where('postulaciones.estatus',1)->where('evaluaciones_candidatos.estatus',1)->where('postulaciones.estatus',2)->get();

        
        $ban = 0;
        return view('graficas.grafica_1')->with('ofertas',$ofertas)->with('postulaciones',$postulaciones)->with('evaluaciones',$evaluaciones)->with('ban',$ban);
   

    }


    public function grafica_usuarios(){
        $users = Users::orWhere('estatus',1)->orWhere('estatus',0)->get();
        $tipos_usuarios = Tipos_usuarios::where('estatus',1)->get();
        
        $ban = false;
        return view('graficas.graficas_usu')->with('users',$users)->with('tipos_usuarios',$tipos_usuarios)->with('ban',$ban);
    }

    public function graficas_guias(){
        $guias = Guias::orWhere('estatus',1)->orWhere('estatus',0)->get();
        $tipos_guias = Tipos_guias::where('estatus',1)->get();
        $guias_favoritas = Guias_favoritas::where('estatus',1)->get();
        $guias_favoritass =DB::table('guias_favoritas')->leftJoin('guias','guias_favoritas.guia_id','=','guias.id')->where('guias_favoritas.estatus',1)->where('guias.estatus',1)->get();
        $ban = false;
        return view('graficas.graficas_guia')->with('guias',$guias)->with('tipos_guias',$tipos_guias)->with('guias_favoritas',$guias_favoritas)->with('guias_favoritass',$guias_favoritass)->with('ban',$ban);
    }
}
