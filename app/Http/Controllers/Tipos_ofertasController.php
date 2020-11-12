<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos_ofertas; 

class Tipos_ofertasController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarioAdmin');
    }
    public function index()
    {
        $tipos_ofertas = Tipos_ofertas::where('estatus',1)->orderBy('id')->get();
        return view('Tipos_ofertas.index')->with('tipos_ofertas',$tipos_ofertas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tipos_ofertas.create');
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
        Tipos_ofertas::create($datos);
        return redirect('/tipos_ofertas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_oferta = Tipos_ofertas::find($id);
        return view('Tipos_ofertas.read')->with('tipo_oferta',$tipo_oferta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo_oferta = Tipos_ofertas::find($id);
        return view('Tipos_ofertas.edit')->with('tipo_oferta',$tipo_oferta);
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
        $tipo_oferta = Tipos_ofertas::find($id);
        $tipo_oferta->update($datos);
        return redirect('/tipos_ofertas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_oferta =Tipos_ofertas::find($id);
        $tipo_oferta->estatus = 0;
        $tipo_oferta -> save();
        return redirect('/tipos_ofertas');
    }
}
