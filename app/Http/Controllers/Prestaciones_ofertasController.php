<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestaciones;
use App\Ofertas;
use App\Prestaciones_ofertas;

class Prestaciones_ofertasController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarionEmp_Cand');
    }
    public function index()
    {
        $prestaciones_ofertas = Prestaciones_ofertas::where('estatus',1)->get();
        return view('Prestaciones_ofertas.index')->with('prestaciones_ofertas',$prestaciones_ofertas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prestaciones = Prestaciones::where('estatus',1)->get();
        $ofertas = Ofertas::where('estatus',1)->get();
        return view('Prestaciones_ofertas.create')->with('prestaciones',$prestaciones)->with('ofertas',$ofertas);
    }


    
    
    public function store(Request $request)
    {
        $datos = $request->all();
        Prestaciones_ofertas::create($datos);
        return redirect('/prestaciones_ofertas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $prestacion_oferta = Prestaciones_ofertas::find($id);
        
        
        return view('Prestaciones_ofertas.read')->with('prestacion_oferta',$prestacion_oferta);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestacion_oferta = Prestaciones_ofertas::find($id);
        $prestaciones = Prestaciones::where('estatus',1)->get();
        $ofertas = Ofertas::where('estatus',1)->get();
        return view('Prestaciones_ofertas.edit')->with('prestaciones',$prestaciones)->with('ofertas',$ofertas)->with('prestacion_oferta',$prestacion_oferta);
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
        $prestacion_oferta = Prestaciones_ofertas::find($id);
        $prestacion_oferta->update($datos);
        return redirect('/prestaciones_ofertas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestacion_oferta = Prestaciones_ofertas::find($id);
        $prestacion_oferta->estatus = 0;
        $prestacion_oferta->save();
        return redirect('/prestaciones_ofertas');
    }
} 
