<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Estudios;
use App\Paises;
use App\Curriculums;
use App\Estudios_curriculums;

class EstudiosController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioCandidato');
    }
    public function index()
    {
        $estudios = Estudios::where('estatus',1)->orderBy('nombre_escuela')->get();
        return view('Estudios.index')->with('estudios',$estudios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Paises::select('id','nombre')->orderBy('nombre')->where('estatus',1)->get();
        
        return view('Estudios.create')->with('paises',$paises); 
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
            
            'fecha_inicio' => ['date','required'],
            'fecha_fin' => ['date','required'],
            'titulo' => ['String','required'],
            'nombre_escuela' => ['String','required'],
            'ciudad' => ['String','required'],
            'pais_id' => ['required'],
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        $estudio= Estudios::create($datos);
        $user = Auth::user();
        $curriculum_id=Curriculums::select('id')->where('candidato_id',$user->id)->where('estatus',1)->first();
        $estudio_curriculum = new Estudios_curriculums();
        $estudio_curriculum->curriculum_id = $curriculum_id->id;
        $estudio_curriculum->estudio_id = $estudio->id;
        $estudio_curriculum->estatus = 1;
        $estudio_curriculum->save();
        return view('Curriculums.agregar');
        //return redirect('curriculum/'.$curriculum_id->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $estudio = Estudios::find($id);
        return view('Estudios.read')->with('estudio',$estudio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudio = Estudios::find($id);
        $paises = Paises::select('id','nombre')->orderBy('nombre')->get();
        $user = Auth::user();
        $curriculum_id=Curriculums::select('id')->where('candidato_id',$user->id)->where('estatus',1)->first();
        return view('Estudios.edit')->with('estudio',$estudio)->with('paises',$paises)->with('curriculum_id',$curriculum_id);
        
    }
    public function edit1($id)
    {
        $estudio = Estudios::find($id);
        $paises = Paises::select('id','nombre')->orderBy('nombre')->get();
        $user = Auth::user();
        $curriculum_id=Curriculums::select('id')->where('candidato_id',$user->id)->where('estatus',1)->first();
        return view('Estudios.edit')->with('estudio',$estudio)->with('paises',$paises)->with('curriculum_id',$curriculum_id);
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
            
            'fecha_inicio' => ['date','required'],
            'fecha_fin' => ['date','required'],
            'titulo' => ['String','required'],
            'nombre_escuela' => ['String','required'],
            'ciudad' => ['String','required'],
            'pais_id' => ['required'],
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        $estudio = Estudios::find($id);
        $estudio->update($datos);
        $user = Auth::user();
        $curriculum = Curriculums::where('candidato_id',$user->id)->where('estatus',1)->first();
        return redirect('/curriculum/'.$curriculum->id);
        //return redirect('/estudios');
        //return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudio = Estudios::find($id);
        $estudio->estatus = 0;
        $estudio->save();
        return redirect('/estudios');
    }
}
