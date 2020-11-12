<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Curriculums;
use App\Experiencias;
use App\Experiencias_curriculums;
use App\Paises;

class ExperienciasController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioCandidato');
    }
     public function index()
    {
        $experiencias = Experiencias::where('estatus',1)->orderBy('nombre_lugar')->get();
        return view('Experiencias.index')->with('experiencias',$experiencias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Paises::select('id','nombre')->orderBy('nombre')->get();
        
        return view('Experiencias.create')->with('paises',$paises); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), [
            'nombre_lugar' => ['String','required'],
            'tiempo_inicio' => ['date','required'],
            'tiempo_fin' => ['date','required'],
            'pais_id' => ['required'],
            'ciudad' => ['String','required'],
            'cargo' => ['String','required'],
            'descripcion' => ['String','required'],
            
            
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        $experiencia = Experiencias::create($datos);
        $user = Auth::user();
        $curriculum_id=Curriculums::select('id')->where('candidato_id',$user->id)->where('estatus',1)->first();
        $experiencia_curriculum = new Experiencias_curriculums();
        $experiencia_curriculum->curriculum_id = $curriculum_id->id;
        $experiencia_curriculum->experiencia_id = $experiencia->id;
        $experiencia_curriculum->estatus = 1;
        $experiencia_curriculum->save();
        return view('Curriculums.agregar');
        //return redirect('curriculum/'.$curriculum_id->id);
        //return redirect('/experiencias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $experiencia = Experiencias::find($id);
        return view('Experiencias.read')->with('experiencia',$experiencia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiencia = Experiencias::find($id);
        $paises = Paises::select('id','nombre')->orderBy('nombre')->get();
        $user = Auth::user();
        $curriculum_id=Curriculums::select('id')->where('candidato_id',$user->id)->where('estatus',1)->first();
        return view('Experiencias.edit')->with('experiencia',$experiencia)->with('paises',$paises)->with('curriculum_id',$curriculum_id);
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
            'nombre_lugar' => ['String','required'],
            'tiempo_inicio' => ['date','required'],
            'tiempo_fin' => ['date','required'],
            'pais_id' => ['required'],
            'ciudad' => ['String','required'],
            'cargo' => ['String','required'],
            'descripcion' => ['String','required'],
            
            
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        $experiencia = Experiencias::find($id);
        $experiencia->update($datos);
        $user = Auth::user();
        $curriculum = Curriculums::where('candidato_id',$user->id)->where('estatus',1)->first();
        return redirect('/curriculum/'.$curriculum->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiencia = Experiencias::find($id);
        $experiencia->estatus = 0;
        $experiencia->save();
        return redirect('/experiencias');
    }
}
