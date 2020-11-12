<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Paises;

class PaisesController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarioAdmin');
    }
    public function index()
    {
        $paises = Paises::where('estatus',1)->orderBy('nombre')->get();
        return view('Paises.index')->with('paises',$paises);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Paises.create');
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
            'nombre' => ['String','min:3', 'max:80','required'],
            'clave' => ['String','min:2','max:2','required','unique:App\Paises,clave'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        Paises::create($datos);
        return redirect('/paises');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pais = Paises::find($id);
        return view('Paises.read')->with('pais',$pais);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pais = Paises::find($id);
        return view('Paises.edit')->with('pais',$pais);
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
            'nombre' => ['String','min:3', 'max:80','required'],
            'estatus' => ['required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $pais = Paises::find($id);
        if ($pais->clave ==$request->clave) {
            $datos =$request->all();
        $pais->update($datos);
        return redirect('/paises');
        }else{
            $v = \Validator::make($request->all(), [
            'nombre' => ['String','min:3', 'max:80','required'],
            'clave' => ['String','min:2','max:2','required','unique:App\Paises,clave'],
            'estatus' => ['required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pais =Paises::find($id);
        $pais->estatus = 0;
        $pais -> save();
        return redirect('/paises');
    }
}
