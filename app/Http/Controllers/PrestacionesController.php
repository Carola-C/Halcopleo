<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestaciones;

class PrestacionesController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarionoRegis');
    }
    public function index()
    {
        $prestaciones = Prestaciones::where('estatus',1)->orderBy('id')->get();
        return view('Prestaciones.index')->with('prestaciones',$prestaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Prestaciones.create');
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
            'descripcion' => ['required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        Prestaciones::create($datos);
        return redirect('/prestaciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestacion = Prestaciones::find($id);
        return view('Prestaciones.read')->with('prestacion',$prestacion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestacion = Prestaciones::find($id);
        return view('Prestaciones.edit')->with('prestacion',$prestacion);
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
            'descripcion' => ['required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos =$request->all();
        $prestacion = Prestaciones::find($id);
        $prestacion->update($datos);
        return redirect('/prestaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestacion =Prestaciones::find($id);
        $prestacion->estatus = 0;
        $prestacion -> save();
        return redirect('/prestaciones');
    }
}
