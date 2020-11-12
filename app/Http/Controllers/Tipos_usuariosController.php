<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos_usuarios;

class Tipos_usuariosController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarioAdmin');
    }
    public function index()
    {
        $tipos_usuarios = Tipos_usuarios::where('estatus',1)->orderBy('id')->get();
        return view('Tipos_usuarios.index')->with('tipos_usuarios',$tipos_usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tipos_usuarios.create');
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
            'nombre' => ['String','min:3', 'max:150','required'],
            
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        Tipos_usuarios::create($datos);
        return redirect('/tipos_usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipos_usuario = Tipos_usuarios::find($id);
        return view('Tipos_usuarios.read')->with('tipos_usuario',$tipos_usuario);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos_usuario = Tipos_usuarios::find($id);
        return view('Tipos_usuarios.edit')->with('tipos_usuario',$tipos_usuario);
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
            'nombre' => ['String','min:3', 'max:150','required'],
            
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos =$request->all();
        $tipos_usuario = Tipos_usuarios::find($id);
        $tipos_usuario->update($datos);
        return redirect('/tipos_usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipos_usuario =Tipos_usuarios::find($id);
        $tipos_usuario->estatus = 0;
        $tipos_usuario -> save();
        return redirect('/tipos_usuarios');
    }
}
