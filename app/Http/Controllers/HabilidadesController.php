<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Habilidades;
use App\Curriculums;

class HabilidadesController extends Controller
{ 
    
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
        $habilidades = Habilidades::where('estatus',1)->orderBy('nombre')->get();
        return view('Habilidades.index')->with('habilidades',$habilidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Habilidades.create');
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
           'estatus' => ['required'],
            'nombre' => ['String','min:3', 'max:250','required'],
            
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        Habilidades::create($datos);
        return redirect('/habilidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habilidad = Habilidades::find($id);
        return view('Habilidades.read')->with('habilidad',$habilidad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habilidad = Habilidades::find($id);
        return view('Habilidades.edit')->with('habilidad',$habilidad);
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
           'estatus' => ['required'],
            'nombre' => ['String','min:3', 'max:250','required'],
            
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos =$request->all();
        $habilidad = Habilidades::find($id);
        $habilidad->update($datos);
        return redirect('/habilidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habilidad =Habilidades::find($id);
        $habilidad->estatus = 0;
        $habilidad -> save();
        return redirect('/habilidades');
    }

    public function agregar_h(){
        $user = Auth::user();
        $curriculum = Curriculums::where('candidato_id',$user->id)->first();
        $habilidades = Habilidades::orderBy('id')->where('estatus',1)->get();
        return view('Curriculums.agregar_hab')->with('habilidades',$habilidades)->with('curriculum',$curriculum);
    }
}
