<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Conocimientos;
use App\Conocimientos_curriculums;
use App\Habilidades_curriculums;
use App\Habilidades;
use App\Curriculums;
use App\Municipios;
use App\Ofertas;
use App\Estudios;
use App\Experiencias;
use App\Postulaciones;
use App\Guias;
use App\Guias_favoritas;
use App\Estudios_curriculums;
use App\Experiencias_curriculums;
use App\Prestaciones;
use App\Prestaciones_ofertas;
use App\Evaluaciones_candidatos;
use Illuminate\Support\Facades\DB;

use Storage;
use App\Order;
use App\Mail\OrderShipped;
use App\Mail\Message;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class AjaxController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function combo_municipios_x_entidad1($entidad_id){
        $municipios = Municipios::select('id','nombre')->where('entidad_id',$entidad_id)->where('estatus',1)->get();
        return $municipios;
    }
    
    public function mostrar($id){
        $oferta = Ofertas::find($id);
        $oferta1 = "Empresa: ".$oferta->empresas->razon_social."\nEmpleo: ".$oferta->nombre."\nTiempo: ".$oferta->tiempo."\nSalario: $".$oferta->salario."\nDetalles: ".$oferta->descripcion."\nDirección: Calle ".$oferta->calle." #".$oferta->no_edificio." Colonia ".$oferta->colonia." C.P. ".$oferta->cp.", ".$oferta->municipios->nombre.", ".$oferta->entidades->nombre;
        return $oferta1;
    }
    
    public function ver_mas($tipo, $curri){
        if ($tipo ==1) {
            $habilidades =DB::table('habilidades_curriculums')->leftJoin('habilidades','habilidades_curriculums.habilidad_id','=','habilidades.id')->where('curriculum_id',$curri)->where('habilidades_curriculums.estatus',1)->get();
            //$habilidades = Habilidades_curriculums::where('curriculum_id',$curri)->where('estatus',1)->get();
            return $habilidades;
        };
        if ($tipo ==2) {
            $conocimientos =DB::table('conocimientos_curriculums')->leftJoin('conocimientos','conocimientos_curriculums.conocimiento_id','=','conocimientos.id')->where('curriculum_id',$curri)->where('conocimientos_curriculums.estatus',1)->get();
            return $conocimientos;
        };
        if ($tipo ==3) {
            $estudios =DB::table('estudios_curriculums')->leftJoin('estudios','estudios_curriculums.estudio_id','=','estudios.id')->where('curriculum_id',$curri)->where('estudios_curriculums.estatus',1)->get();
            return $estudios;
        };
        if ($tipo ==4) {
            $experiencias =DB::table('experiencias_curriculums')->leftJoin('experiencias','experiencias_curriculums.experiencia_id','=','experiencias.id')->where('curriculum_id',$curri)->where('experiencias_curriculums.estatus',1)->get();
            return $experiencias;
        };
    }

    

    public function mostrar2($id, $tipo){
        if($tipo == 1){
            $estudio = Estudios::find($id);
            $estudio1 = "Escuela: ".$estudio->nombre_escuela."\nTítulo recibido: ".$estudio->titulo."\nPaís: ".$estudio->paises->nombre."\nCiudad: ".$estudio->ciudad."\nPeriodo: ".$estudio->fecha_inicio." - ".$estudio->fecha_fin;
            return $estudio1;
        }
        
        if ($tipo == 2) {
            $experiencia = Experiencias::find($id);
            $experiencia1 = "Lugar: ".$experiencia->nombre_lugar."\nPaís: ".$experiencia->paises->nombre."\nCiudad: ".$experiencia->ciudad."\nCargo: ".$experiencia->cargo."\nTiempo: ".$experiencia->tiempo_inicio." - ".$experiencia->tiempo_fin."\nDescripción: ".$experiencia->descripcion;
            return $experiencia1;
        }
    }

    public function favorito($id){
        $user =Auth::user();
        $favoritos = Postulaciones::where('candidato_id',$user->id)->where('oferta_id',$id)->first();
        if ($favoritos == null) {
            $favorito = new Postulaciones();
            $favorito->candidato_id= $user->id;
            $favorito->oferta_id = $id;
            $favorito->estado = 1;
            $favorito->estatus = 0;
            $favorito->save();
            
            return "Esta favorito";
        }else{
            if ($favoritos->estado == 0) {
                $favoritos->estado = 1;
            $favoritos->save();
            return "De nuevo en favoritode nuevo";
            }else{
                $favoritos->estado = 0;
            $favoritos->save();

            return "Ya no esta favorito";
            }
            
        }
    }

    public function favorito_g($id){
        $user =Auth::user();
        $favoritos = Guias_favoritas::where('candidato_id',$user->id)->where('guia_id',$id)->first();
        if ($favoritos == null ) {
            $favorito = new Guias_favoritas();
            $favorito->candidato_id= $user->id;
            $favorito->guia_id = $id;
            $favorito->estatus = 1;
            $favorito->save();
            
            return "Esta favorito";
        }else{
            if ($favoritos->estatus == 0) {
                $favoritos->estatus = 1;
                $favoritos->save();
            return "De nuevo en favorito";
            }else{
                $favoritos->estatus = 0;
                $favoritos->save();

            return "Ya no esta favorito";
            }
            
        }
    }
    public function postular($id){
        $user =Auth::user();
        $postulaciones = Postulaciones::where('candidato_id',$user->id)->where('oferta_id',$id)->first();
        if ($postulaciones == null) {
            $postulacion = new Postulaciones();
            $postulacion->candidato_id= $user->id;
            $postulacion->oferta_id = $id;
            $postulacion->estado = 0;
            $postulacion->estatus = 1;
            $postulacion->save();
            
            return "Esta postulando";
        }else{
            if ($postulaciones->estatus == 0) {
                $postulaciones->estatus = 1;
            $postulaciones->save();
            return "Esta postulando de nuevo";
            }else{
                $postulaciones->estatus = 0;
            $postulaciones->save();

            return "Ya no esta postulando";
            }
            
        }
        

    }

    public function cambiar($tipo, $id){
        $oferta = Ofertas::find($id);
        if ($tipo ==1) {
            $oferta->estatus=1;
            $oferta->save();
            
        } else {
            $oferta->estatus=3;
            $oferta->save();
            
        }
             
        $ofertas = Ofertas::where('estatus',2)->get();
        return $ofertas;
        
    }

    public function cambiar_g($tipo, $id){
        $guia = Guias::find($id);
        if ($tipo ==1) {
            $guia->estatus=1;
            $guia->save();
            
        } else {
            $guia->estatus=3;
            $guia->save();
            
        }
             
        $guia = Ofertas::where('estatus',2)->get();
        return $guia;
        
    }
    
    public function mostrar_g($id){
        $guia1 = Guias::find($id);
        $guia1 = "Creado por: ".$guia1->users->nombre." ".$guia1->users->ap_pat." ".$guia1->users->ap_mat."\nTipo de guía: ".$guia1->tipos_guias->nombre."\nNombre: ".$guia1->nombre."\nDescripción: ".$guia1->descripcion;
        return $guia1;
    }

    public function agregar_conocimiento($conocimiento, $noselect){
        $usuario =Auth::user();
        $conocimiento = substr($conocimiento, 2);
        $noselect = substr($noselect, 2);
        $array2 = explode(",", $noselect);
        $array = explode(",", $conocimiento);
        $curriculum = Curriculums::where('candidato_id', $usuario->id)->first();
        $id_c = $curriculum->id;
        foreach ($array2 as $key) {
            $reg_e = Conocimientos_curriculums::where('curriculum_id',$id_c)->where('conocimiento_id',$key)->where('estatus',1)->first();
            if ($reg_e !=null) {
                $reg_e->estatus =0;
                $reg_e->save();
            }
        }
        
        foreach ($array as $key ) {
            $reg = Conocimientos_curriculums::where('curriculum_id',$id_c)->where('conocimiento_id',$key)->where('estatus',1)->first();
            if ($reg !=null) {
                //$ban="ya existe";
            }else{
                $reg1 = Conocimientos_curriculums::where('curriculum_id',$id_c)->where('conocimiento_id',$key)->where('estatus',0)->first();
                if ($reg1) {
                    $reg1->estatus=1;
                    $reg1->save();
                } else {
                    $cono_curr = new Conocimientos_curriculums();
            $cono_curr->curriculum_id = $id_c;
            $cono_curr->conocimiento_id = $key;
            $cono_curr->estatus = 1;
            $cono_curr->save();
                }
            }
            
        }
        
        return "<h1>Se modifcaron tus conocimientos</h1>";
    }
    
    public function agregar_habilidad($habilidad, $noselect){
        
        $usuario =Auth::user();
        $habilidad = substr($habilidad, 2);
        $noselect = substr($noselect, 2);
        $array2 = explode(",", $noselect);
        $array = explode(",", $habilidad);
        $curriculum = Curriculums::where('candidato_id', $usuario->id)->first();
        $id_c = $curriculum->id;
        foreach ($array2 as $key) {
            $reg_e = Habilidades_curriculums::where('curriculum_id',$id_c)->where('habilidad_id',$key)->where('estatus',1)->first();
            if ($reg_e !=null) {
                $reg_e->estatus =0;
                $reg_e->save();
            }
        }
        
        foreach ($array as $key ) {
            $reg = Habilidades_curriculums::where('curriculum_id',$id_c)->where('habilidad_id',$key)->where('estatus',1)->first();
            if ($reg !=null) {
                //$ban="ya existe";
            }else{
                $reg1 = Habilidades_curriculums::where('curriculum_id',$id_c)->where('habilidad_id',$key)->where('estatus',0)->first();
                if ($reg1) {
                    $reg1->estatus=1;
                    $reg1->save();
                } else {
                    $cono_curr = new Habilidades_curriculums();
            $cono_curr->curriculum_id = $id_c;
            $cono_curr->habilidad_id = $key;
            $cono_curr->estatus = 1;
            $cono_curr->save();
                }
            }
            
        }
        $habilidades = Habilidades_curriculums::where('curriculum_id',$id_c)->where('estatus',1)->get();
        
        return $habilidades;
    }


    public function agregar_prestacion($prestacion, $noselect, $id){
        
        $usuario =Auth::user();
        $prestacion = substr($prestacion, 2);
        $noselect = substr($noselect, 2);
        $array2 = explode(",", $noselect);
        $array = explode(",", $prestacion);
        $oferta = Ofertas::where('id', $id)->first();
        $id_o = $oferta->id;
        foreach ($array2 as $key) {
            $reg_e = Prestaciones_ofertas::where('oferta_id',$id_o)->where('prestacion_id',$key)->where('estatus',1)->first();
            if ($reg_e !=null) {
                $reg_e->estatus =0;
                $reg_e->save();
            }
        }
        
        foreach ($array as $key ) {
            $reg = Prestaciones_ofertas::where('oferta_id',$id_o)->where('prestacion_id',$key)->where('estatus',1)->first();
            if ($reg !=null) {
                //$ban="ya existe";
            }else{
                $reg1 = Prestaciones_ofertas::where('oferta_id',$id_o)->where('prestacion_id',$key)->where('estatus',0)->first();
                if ($reg1) {
                    $reg1->estatus=1;
                    $reg1->save();
                } else {
                    $prest_ofer = new Prestaciones_ofertas();
            $prest_ofer->oferta_id = $id_o;
            $prest_ofer->prestacion_id = $key;
            $prest_ofer->estatus = 1;
            $prest_ofer->save();
                }
            }
            
        }
        $habilidades = Prestaciones_ofertas::where('oferta_id',$id_o)->where('estatus',1)->get();
        
        return $habilidades;
    }



    public function agregar_estudio($fe_ini,$fe_fin,$titulo,$escuela,$pais,$ciudad){
        $estudio = new Estudios();
        $estudio->fecha_inicio = $fe_ini;
        $estudio->fecha_fin = $fe_fin;
        $estudio->titulo = $titulo;
        $estudio->nombre_escuela = $escuela;
        $estudio->ciudad = $ciudad;
        $estudio->pais_id = $pais;
        $estudio->estatus = 1;
        $estudio->save();


        $user = Auth::user();
        $curriculum_id=Curriculums::select('id')->where('candidato_id',$user->id)->first();
        $estudio_curriculum = new Estudios_curriculums();
        $estudio_curriculum->curriculum_id = $curriculum_id->id;
        $estudio_curriculum->estudio_id = $estudio->id;
        $estudio_curriculum->estatus = 1;
        $estudio_curriculum->save();
        return $estudio;
    }

    public function agregar_experiencia($fe_ini,$fe_fin,$nombre,$cargo,$descr,$pais,$ciudad){
        $experiencia = new Experiencias();
        $experiencia->nombre_lugar = $nombre;
        $experiencia->tiempo_inicio = $fe_ini;
        $experiencia->tiempo_fin = $fe_fin;
        $experiencia->cargo = $cargo;
        $experiencia->descripcion = $descr;
        $experiencia->ciudad = $ciudad;
        $experiencia->pais_id = $pais;
        $experiencia->estatus = 1;
        $experiencia->save();


        $user = Auth::user();
        $curriculum_id=Curriculums::select('id')->where('candidato_id',$user->id)->first();
        $experi_curriculum = new Experiencias_curriculums();
        $experi_curriculum->curriculum_id = $curriculum_id->id;
        $experi_curriculum->experiencia_id = $experiencia->id;
        $experi_curriculum->estatus = 1;
        $experi_curriculum->save();
        return $experiencia;
        
        
    }

    public function actualizar_c($foto,$grado,$escuela,$descripcion){
        /*
        $user = Auth::user();
        $curriculum=Curriculums::where('candidato_id',$user->id)->first();
        $id =$curriculum->id;
        */
        return "paso";
    }

    public function editar_e($id,$cal,$com){

        $evaluacion = Evaluaciones_candidatos::where('id',$id)->first();
        $postulacion = Postulaciones::where('id',$evaluacion->postulacion_id)->first();
        

        $pathToFile="";
        $containfile=false;
        $destinatario= $postulacion->users->email;
        $asunto = "Respuesta de postulación"; 
        $tipo ="Su propuesta ha sido modificada";
        $oferta = $postulacion->ofertas->nombre;
        $empresa = $postulacion->ofertas->empresas->razon_social;
        $contenido = $evaluacion->comentario;

        $data = array('tipo' => $tipo,'oferta' => $oferta,'empresa' => $empresa,'contenido' => $contenido);
        $r = Mail::send('correo.plantilla_correo_em', $data, function($message) use ($asunto,$destinatario, $containfile,$pathToFile){
            $message->from('ccajeror@toluca.tecnm.mx', 'Halcopleo');
            $message->to($destinatario)->subject($asunto);
        });
        
        if (!$r) {
            
            $evaluacion->calificacion =$cal;
            $evaluacion->comentario =$com;
            $evaluacion->save();
        return "<h1>Se actualizó</h1>";
        } else {
            return "no se envió";
        }





        
    }

}
