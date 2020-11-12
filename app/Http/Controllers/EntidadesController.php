<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidades;
use App\Paises;

class EntidadesController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioAdmin');
    }
    public function index()
    {
        $entidades = Entidades::where('estatus',1)->orderBy('clave_pais')->orderBy('nombre')->get();
        return view('Entidades.index')->with('entidades',$entidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Paises::select('clave','nombre')->orderBy('nombre')->get();
        return view('Entidades.create')->with('paises',$paises);
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
            'clave_pais' => ['required'],
            'nombre' => ['String','min:3', 'max:80','required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        Entidades::create($datos);
        return redirect('/entidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entidad = Entidades::find($id);
        return view('Entidades.read')->with('entidad',$entidad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entidad = Entidades::find($id);
        $paises = Paises::select('clave','nombre')->orderBy('nombre')->get();
        return view('Entidades.edit')->with('entidad',$entidad)->with('paises',$paises);
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
            'clave_pais' => ['required'],
            'nombre' => ['String','min:3', 'max:80','required'],
            'estatus' => ['required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        $entidad = Entidades::find($id);
        $entidad->update($datos);
        return redirect('/entidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entidad = Entidades::find($id);
        $entidad->estatus = 0;
        $entidad->save();
        return redirect('/entidades');
    }
}
