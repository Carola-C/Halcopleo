<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipios;
use App\Entidades;

class MunicipiosController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarioAdmin');
    }
    public function index()
    {
        $municipios = Municipios::where('estatus',1)->orderBy('entidad_id')->orderBy('nombre')->get();
        return view('Municipios.index')->with('municipios',$municipios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entidades = Entidades::select('id','nombre')->orderBy('nombre')->where('estatus',1)->get();
        return view('Municipios.create')->with('entidades',$entidades);
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
            'entidad_id' => ['required'],
            'nombre' => ['String','min:3', 'max:80','required'],
            
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        Municipios::create($datos);
        return redirect('/municipios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $municipio = Municipios::find($id);
        return view('Municipios.read')->with('municipio',$municipio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $municipio = Municipios::find($id);
        $entidades = Entidades::select('id','nombre')->orderBy('nombre')->get();
        return view('Municipios.edit')->with('municipio',$municipio)->with('entidades',$entidades);
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
        $municipio = Municipios::find($id);
        $municipio->update($datos);
        return redirect('/municipios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipio = Municipios::find($id);
        $municipio->estatus = 0;
        $municipio->save();
        return redirect('/municipios');
    }
}
