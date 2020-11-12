<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;
use App\Ofertas;
use App\Postulaciones;
use App\Curriculums;
use App\Evaluaciones_candidatos;
class PostulacionesController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarionEmp_Cand');
    }
    public function index()
    {
        $user = Auth::user();
        $tipo = $user->tipo_usuario_id;
        if ($tipo == 3) {
            $postulaciones = Postulaciones::where('estatus',1)->where('candidato_id',$user->id)->orWhere('estatus',2)->where('candidato_id',$user->id)->get();
        return view('Postulaciones.index_c')->with('postulaciones',$postulaciones)->with('mjs',"Mis postulaciones");
        }else{
            $postulaciones = Postulaciones::where('estatus',1)->get();
            $evaluaciones = Evaluaciones_candidatos::where('estatus',1)->get();
            $ban= false;
        return view('Postulaciones.index')->with('postulaciones',$postulaciones)->with('evaluaciones',$evaluaciones)->with('ban',$ban);
        };
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Users::where('tipo_usuario_id',3)->where('estatus',1)->get();
        $ofertas = Ofertas::where('estatus',1)->get();
        return view('Postulaciones.create')->with('users',$users)->with('ofertas',$ofertas);
    }


    
    
    public function store(Request $request)
    {
        $datos = $request->all();
        Postulaciones::create($datos);
        return redirect('/postulaciones');
    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $postulacion = Postulaciones::find($id);
        $curriculum = Curriculums::where('candidato_id',$postulacion->candidato_id)->where('estatus',1)->get();
        $evaluacion = Evaluaciones_candidatos::where('postulacion_id',$id)->where('estatus',1)->get();
        $ban = count(Evaluaciones_candidatos::where('postulacion_id',$id)->where('estatus',1)->get());
        return view('Postulaciones.read')->with('postulacion',$postulacion)->with('curriculum',$curriculum)->with('evaluacion',$evaluacion)->with('ban',$ban);
    } 

    public function show1($id) 
    {
        $postulacion = Postulaciones::find($id);
        $banO = count(Ofertas::where('id',$postulacion->oferta_id)->where('estatus',1)->get());
        $curriculum = Curriculums::where('candidato_id',$postulacion->candidato_id)->where('estatus',1)->get();
        $evaluacion = Evaluaciones_candidatos::where('postulacion_id',$id)->where('estatus',1)->get();
        $ban = count(Evaluaciones_candidatos::where('postulacion_id',$id)->where('estatus',1)->get());
        return view('Postulaciones.read_c')->with('postulacion',$postulacion)->with('curriculum',$curriculum)->with('evaluacion',$evaluacion)->with('ban',$ban)->with('banO',$banO);
    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postulacion = Postulaciones::find($id);
        $users = Users::where('tipo_usuario_id',3)->where('estatus',1)->get();
        $ofertas = Ofertas::where('estatus',1)->get();
        return view('Postulaciones.edit')->with('users',$users)->with('ofertas',$ofertas)->with('postulacion',$postulacion);
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
        $datos = $request->all();
        $postulacion = Postulaciones::find($id);
        $postulacion->update($datos);
        return redirect('/postulaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $tipo = $user->tipo_usuario_id;
        $postulacion = Postulaciones::find($id);
        if ($tipo == 2) {
            $postulacion->estatus = 2;
        $postulacion->save();
        return redirect('/postulaciones');
        } 
        if ($tipo == 3) {
            $postulacion->estatus = 0;
        $postulacion->save();
        $postulaciones = Postulaciones::where('estatus',1)->where('candidato_id',$user->id)->get();
        return redirect('/postulaciones');
        //return view('Postulaciones.index_c')->with('postulaciones',$postulaciones)->with('mjs',"Mis postulaciones");
        }
        
    }

    public function index_f()
    {
        $user = Auth::user();
        $tipo = $user->tipo_usuario_id;
        
        $postulaciones = Postulaciones::where('estado',1)->where('candidato_id',$user->id)->get();
        return view('Ofertas.index_fav')->with('postulaciones',$postulaciones)->with('mjs',"Mis favoritos");
    }
} 
