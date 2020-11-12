<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grados_max_estudios;

class Grados_max_estudiosController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioAdmin');
    }
    public function index()
    {
        $grados_max_estudios = Grados_max_estudios::where('estatus',1)->get();
        return view('Grados_max_estudios.index')->with('grados_max_estudios',$grados_max_estudios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Grados_max_estudios.create');
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
        Grados_max_estudios::create($datos);
        return redirect('/grados_max_estudios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grados_max_estudio = Grados_max_estudios::find($id);
        return view('Grados_max_estudios.read')->with('grados_max_estudio',$grados_max_estudio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grados_max_estudio = Grados_max_estudios::find($id);
        return view('Grados_max_estudios.edit')->with('grados_max_estudio',$grados_max_estudio);
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
        $grados_max_estudio = Grados_max_estudios::find($id);
        $grados_max_estudio->update($datos);
        return redirect('/grados_max_estudios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grados_max_estudio =Grados_max_estudios::find($id);
        $grados_max_estudio->estatus = 0;
        $grados_max_estudio -> save();
        return redirect('/grados_max_estudios');
    }
}
