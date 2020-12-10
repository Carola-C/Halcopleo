<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Curriculums;
use App\Users;
use App\Grados_max_estudios;
use App\Paises;
use App\Conocimientos;
use App\Estudios;
use App\Experiencias;
use App\Habilidades;
use App\Conocimientos_curriculums;
use App\Habilidades_curriculums;
use App\Estudios_curriculums;
use App\Experiencias_curriculums;
use Storage;
use Illuminate\Support\Facades\Validator;
class CurriculumsController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Curriculums.index')->with('curriculums',$curriculums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function create()
    {

        $users = Auth::user();
        //{{Auth::user()->id}}
        //$users = Users::select('id','nombre')->get();
        $grados_max_estudios = Grados_max_estudios::select('id','nombre')->where('estatus',1)->get();
        $conocimientos = Conocimientos::orderBy('id')->where('estatus',1)->get();
        $ban = count(Curriculums::select('id')->where('candidato_id',$users->id)->where('estatus',1)->get());
        if ($ban === 0) {
            return view('Curriculums.create')->with('users',$users)->with('grados_max_estudios',$grados_max_estudios)->with('conocimientos',$conocimientos); 
            
        } else {
            $id = Curriculums::select('id')->where('candidato_id',$users->id)->where('estatus',1)->first();
            //$curriculums = Curriculums::where('candidato_id',$users->id)->get();
            $curriculum = Curriculums::find($id);
            $idc =Auth::user()->id;
            $userss = Users::where('id',$idc)->get();
            return view('Candidato.curriculum_crear')->with('curriculum',$curriculum)->with('userss',$userss);
            //return redirect()->route('show_c/',$id);
        }
        
 
         
        /*
        $users = Users::select('id','nombre','ap_pat')->orderBy('nombre')->where('tipo_usuario_id',3)->where('estatus',1)->get();
        $grados_max_estudios = Grados_max_estudios::select('id','nombre')->get();
        return view('Curriculums.create')->with('users',$users)->with('grados_max_estudios',$grados_max_estudios); 
        */
    }
    public function agregar(){
        $user = Auth::user();
        $curriculum = Curriculums::where('candidato_id',$user->id)->first();
        $conocimientos = Conocimientos::orderBy('id')->where('estatus',1)->get();

        return view('Curriculums.agregar_mas')->with('conocimientos',$conocimientos)->with('curriculum',$curriculum);
    }

    

    public function store(Request $request)
    {
        
        $datos = $request->all();
        if ($request->file("foto_ruta")== null) {
            Curriculums::create($datos);
             $conocimientos = Conocimientos::orderBy('id')->where('estatus',1)->get();
        $habilidades = Habilidades::where('estatus',1)->get();
        $paises = Paises::where('estatus',1)->get();
        return view('Curriculums.agregar');
        } else {
            $v = \Validator::make($request->all(), [
            'foto_ruta' => ['required','image'],
            'grado_max_id' => ['required'],
            'nombre_escuela' => ['String','min:3', 'max:250','required'],
            'descripcion_candidato' => ['required'],
            ]);

 
            if ($v->fails())
            {
                return redirect()->back()->withInput()->withErrors($v->errors());
            }
            $rutaarchivos ="../storage/curriculums/";
            $hora =date("h:i:s");
            $fecha = date("d-m-Y");
            $prefijo = $fecha."_".$hora;
            $archivo = $request->file("foto_ruta");
            $ruta = time().$archivo->getClientOriginalName();
            $r1 = Storage::disk('curriculums')->put($ruta, \File::get($archivo));
            
            if ($r1) {
                $datos['foto_ruta'] =$ruta;
                Curriculums::create($datos);
                 $conocimientos = Conocimientos::orderBy('id')->where('estatus',1)->get();
            $habilidades = Habilidades::where('estatus',1)->get();
            $paises = Paises::where('estatus',1)->get();
            return view('Curriculums.agregar');
            } else {
                return view("mensaje.error_acceso")->with('mjs','No se pudo crear');
            }
        }








        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curriculum = Curriculums::find($id);
        return view('Curriculums.read')->with('curriculum',$curriculum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curriculum = Curriculums::find($id);
        $users = Users::select('id','nombre')->orderBy('nombre')->get();
        $grados_max_estudios = Grados_max_estudios::select('id','nombre')->get();
        $habilidades = Habilidades::where('estatus',1)->get();
        $habilidades_curriculums = Habilidades_curriculums::where('curriculum_id',$id)->where('estatus',1)->get();
        $ban=0;
        $conocimientos = Conocimientos::where('estatus',1)->get();
        $conocimientos_curriculums =Conocimientos_curriculums::where('curriculum_id',$id)->where('estatus',1)->get();
        $estudios_curriculums = Estudios_curriculums::where('curriculum_id',$id)->where('estatus',1)->get();
        $experiencias_curriculums = Experiencias_curriculums::where('curriculum_id',$id)->where('estatus',1)->get();
        $paises = Paises::where('estatus',1)->get();
        return view('Curriculums.edit')->with('curriculum',$curriculum)->with('users',$users)->with('grados_max_estudios',$grados_max_estudios)->with('habilidades',$habilidades)->with('habilidades_curriculums',$habilidades_curriculums)->with('conocimientos',$conocimientos)->with('conocimientos_curriculums',$conocimientos_curriculums)->with('estudios_curriculums',$estudios_curriculums)->with('experiencias_curriculums',$experiencias_curriculums)->with('ban',$ban)->with('paises',$paises);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = \Validator::make($request->all(), [
            //'foto_ruta' => ['required','image'],
            'grado_max_id' => ['required'],
            'nombre_escuela' => ['String','min:3', 'max:250','required'],
            'descripcion_candidato' => ['required'],
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        $curriculum = Curriculums::find($id);
        if ($request->file("foto_ruta")== null) {
            $datos['foto_ruta'] =$curriculum->foto_ruta;
            $curriculum->update($datos);
            return redirect()->back();
        } else {
            $v = \Validator::make($request->all(), [
            'foto_ruta' => ['required','image'],
            'grado_max_id' => ['required'],
            'nombre_escuela' => ['String','min:3', 'max:250','required'],
            'descripcion_candidato' => ['required'],
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $rutaarchivos ="../storage/curriculums/";
        $hora =date("h:i:s");
        $fecha = date("d-m-Y");
        $prefijo = $fecha."_".$hora;
        $archivo = $request->file("foto_ruta");
        $ruta = $prefijo.'_'.$archivo->getClientOriginalName();
        $r1 = Storage::disk('curriculums')->put($ruta, \File::get($archivo));
        
        if ($r1) {
            $datos['foto_ruta'] =$ruta;
            $curriculum->update($datos);
            return redirect()->back();
        } else {
            return view("mensaje.error_acceso")->with('mjs','No se pudo editar');
        }
        }
        
        
        
        /*
        $curriculum->update($datos);
        return redirect()->back();
        */

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curriculum = Curriculums::find($id);
        $curriculum->estatus = 0;
        $curriculum->save();
        return redirect('/curriculums');
    }

    public function opciones($tipo){
        $user = Auth::user();
        $curriculum = Curriculums::where('candidato_id',$user->id)->where('estatus',1)->first();
        if ($tipo ==1) {
            $habilidades = Habilidades::where('estatus',1)->get();
            $habilidades_curriculums = Habilidades_curriculums::where('curriculum_id',$curriculum->id)->where('estatus',1)->get();
            $banc=false;
            $msj="";
            return view('Candidato.hab_con')->with('habilidades',$habilidades)->with('ban',1)->with('habilidades_curriculums',$habilidades_curriculums)->with('banc',$banc)->with('msj',$msj);
        }
        if ($tipo ==2) {
            $conocimientos = Conocimientos::where('estatus',1)->get();
            $conocimientos_curriculums =Conocimientos_curriculums::where('curriculum_id',$curriculum->id)->where('estatus',1)->get();
            $banb=false;
            $msj="";
            return view('Candidato.hab_con')->with('conocimientos',$conocimientos)->with('ban',2)->with('conocimientos_curriculums',$conocimientos_curriculums)->with('banb',$banb)->with('msj',$msj);
        }
    }

    public function conocimientos_a(Request $request){
        $user = Auth::user();
        $conocimientos = $request->input('conocimiento');
        $curriculum = Curriculums::where('candidato_id',$user->id)->where('estatus',1)->first();
        $conocimientos_curriculums =Conocimientos_curriculums::where('curriculum_id',$curriculum->id)->where('estatus',1)->get();
        if ($conocimientos == null) {
            $conocimientos = Conocimientos::where('estatus',1)->get();
            $conocimientos_curriculums =Conocimientos_curriculums::where('curriculum_id',$curriculum->id)->where('estatus',1)->get();
            $banb=false;
            $msj="Seleccionar al menos una";
            return view('Candidato.hab_con')->with('conocimientos',$conocimientos)->with('ban',2)->with('conocimientos_curriculums',$conocimientos_curriculums)->with('banb',$banb)->with('msj',$msj);
        }else{
            foreach ($conocimientos as $conocimiento) {
            $ban=false;
            foreach ($conocimientos_curriculums as $conocimientos_curriculum) {
                if ($conocimiento == $conocimientos_curriculum->conocimiento_id) {
                    $ban=true;
                }
            }
            if($ban == 0){
            $conocimiento_curriculum = new Conocimientos_curriculums();
            $conocimiento_curriculum->curriculum_id = $curriculum->id;
            $conocimiento_curriculum->conocimiento_id = $conocimiento;
            $conocimiento_curriculum->estatus = 1;
            $conocimiento_curriculum->save();
            }
        }
        return view('Curriculums.agregar');
        }
        
    }
    public function habilidades_a(Request $request){
        $user = Auth::user();
        $habilidades = $request->input('habilidad');
        $curriculum = Curriculums::where('candidato_id',$user->id)->where('estatus',1)->first();
        $habilidades_curriculums = Habilidades_curriculums::where('curriculum_id',$curriculum->id)->where('estatus',1)->get();
        if($habilidades == null){
            $habilidades = Habilidades::where('estatus',1)->get();
            $habilidades_curriculums = Habilidades_curriculums::where('curriculum_id',$curriculum->id)->where('estatus',1)->get();
            $banc=false;
            $msj="Seleccionar al menos una";
            return view('Candidato.hab_con')->with('habilidades',$habilidades)->with('ban',1)->with('habilidades_curriculums',$habilidades_curriculums)->with('banc',$banc)->with('msj',$msj);
        }else{
            foreach ($habilidades as $habilidad) {
            $ban=false;
            foreach ($habilidades_curriculums as $habilidades_curriculum) {
                if ($habilidad == $habilidades_curriculum->habilidad_id) {
                    $ban=true;
                }
            }
            if($ban == 0){
            $habilidad_curriculum = new Habilidades_curriculums();
            $habilidad_curriculum->curriculum_id = $curriculum->id;
            $habilidad_curriculum->habilidad_id = $habilidad;
            $habilidad_curriculum->estatus = 1;
            $habilidad_curriculum->save();
            }
        }
        return view('Curriculums.agregar');
        }
        
    }
}
