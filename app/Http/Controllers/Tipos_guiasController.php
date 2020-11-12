<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos_guias;

class Tipos_guiasController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarioAdmin');
    }
    public function index()
    {
        $tipos_guias = Tipos_guias::where('estatus',1)->orderBy('id')->get();
        return view('Tipos_guias.index')->with('tipos_guias',$tipos_guias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tipos_guias.create');
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
        Tipos_guias::create($datos);
        return redirect('/tipos_guias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_guia = Tipos_guias::find($id);
        return view('Tipos_guias.read')->with('tipo_guia',$tipo_guia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_guia = Tipos_guias::find($id);
        return view('Tipos_guias.edit')->with('tipo_guia',$tipo_guia);
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
        $tipo_guia = Tipos_guias::find($id);
        $tipo_guia->update($datos);
        return redirect('/tipos_guias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_guia =Tipos_guias::find($id);
        $tipo_guia->estatus = 0;
        $tipo_guia -> save();
        return redirect('/tipos_guias');
    }
}
