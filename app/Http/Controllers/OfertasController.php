<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Empresas;
use App\Tipos_ofertas;
use App\Entidades;
use App\Municipios;
use App\Ofertas;
use App\Postulaciones;
use App\Prestaciones_ofertas;
use App\Prestaciones;
use App\Empresas_empleadores;
use App\Curriculums;
class OfertasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user= Auth::user();
        $empresas =DB::table('empresas_empleadores')->leftJoin('empresas','empresas_empleadores.empresa_id','=','empresas.id')->where('empleador_id',$user->id)->get();
        foreach ($empresas as $key) {
            $id=$key->empresa_id;
        }
        
        $ofertas = Ofertas::orwhere('estatus',1)->where('empresa_id',$id)->orWhere('estatus',2)->where('empresa_id',$id)->orWhere('estatus',3)->where('empresa_id',$id)->get();
        return view('Ofertas.index')->with('ofertas',$ofertas)->with('empresas',$empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= Auth::user();
        //$empresas =DB::table('empresas_empleadores')->leftJoin('empresas','empresas_empleadores.empresa_id','=','empresas.id')->where('empleador_id',$user->id)->get();
        $entidades = Entidades::select('id','nombre')->where('estatus',1)->orderBy('nombre')->get();
        $municipios = Municipios::select('id','nombre','entidad_id')->where('estatus',1)->orderBy('nombre')->get();
        $tipos_ofertas = Tipos_ofertas::select('id','nombre')->where('estatus',1)->orderBy('nombre')->get();
        //$empresas = Empresas::select('id','razon_social')->where('estatus',1)->get();
        $usuario =Auth::user();
        $prestaciones = Prestaciones::where('estatus',1)->get();
        $empresas = Empresas_empleadores::where('empleador_id',$usuario->id)->where('estatus',1)->first();
        return view('Ofertas.create')->with('entidades',$entidades)->with('municipios',$municipios)->with('tipos_ofertas',$tipos_ofertas)->with('empresas',$empresas)->with('prestaciones',$prestaciones);
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
            'tipo_oferta_id' => ['required'],
            'nombre' => ['String','min:3', 'max:250','required'],
            'tiempo' => ['required'],
            'salario' => ['numeric','required'],
            'descripcion' => ['required'],
            'entidad_id' => ['required'],
            'municipio_id' => ['required'],
            'colonia' => ['String','min:3', 'max:150','required'],
            'calle' => ['String','min:3', 'max:150','required'],
            'cp' => ['Integer','digits:5','required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $oferta = Ofertas::create(
            [
                'empresa_id'=> $request->empresa_id,
                'tipo_oferta_id'=> $request->tipo_oferta_id,
                'nombre'=> $request->nombre,
                'tiempo'=> $request->tiempo,
                'salario'=> $request->salario,
                'descripcion'=> $request->descripcion,
                'calle'=> $request->calle,
                'no_edificio'=> $request->no_edificio,
                'cp'=> $request->cp,
                'colonia'=> $request->colonia,
                'entidad_id'=> $request->entidad_id,
                'municipio_id'=> $request->municipio_id,
                'estatus'=> 2
            ]
        );
        $id_o = $oferta->id;
        $prestacionesArr =  $request->input('prestacionA');
        if ($prestacionesArr==null) {
            return redirect('/ofertas');
        }else{
            foreach ($prestacionesArr as $prestacionesAr) {
            $pret_ofer = new Prestaciones_ofertas();
            $pret_ofer->prestacion_id = $prestacionesAr;
            $pret_ofer->oferta_id = $id_o;
            $pret_ofer->estatus = 1;
            $pret_ofer->save();
        }
        return redirect('/ofertas');
        }
        

        
        /*
        $datos = $request->all();
        $oferta=Ofertas::create($datos);
        return redirect('/ofertas');
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $oferta = Ofertas::find($id);
        
        $prestaciones = Prestaciones_ofertas::Where('oferta_id',$id)->where('estatus',1)->get();
        return view('Ofertas.read')->with('oferta',$oferta)->with('prestaciones',$prestaciones);
    }

    public function show1($id)
    {
        $user = Auth::user();
        $oferta = Ofertas::find($id);
        $postulacion = Postulaciones::where('oferta_id',$id)->where('candidato_id',$user->id)->first();
        $prestaciones = Prestaciones_ofertas::Where('oferta_id',$id)->where('estatus',1)->get();
        return view('Ofertas.read_c')->with('oferta',$oferta)->with('postulacion',$postulacion)->with('prestaciones',$prestaciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oferta = Ofertas::find($id);
        $entidades = Entidades::select('id','nombre')->orderBy('nombre')->get();
        $municipios = Municipios::select('id','nombre','entidad_id')->orderBy('nombre')->get();
        $tipos_ofertas = Tipos_ofertas::select('id','nombre')->orderBy('nombre')->get();
        $empresas = Empresas::select('id','razon_social')->get();
        $prestaciones = Prestaciones::where('estatus',1)->get();
        $prestaciones_ofertas = Prestaciones_ofertas::where('estatus',1)->where('oferta_id',$id)->get();
        return view('Ofertas.edit')->with('oferta',$oferta)->with('entidades',$entidades)->with('municipios',$municipios)->with('tipos_ofertas',$tipos_ofertas)->with('empresas',$empresas)->with('prestaciones',$prestaciones)->with('prestaciones_ofertas',$prestaciones_ofertas);
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
            'tipo_oferta_id' => ['required'],
            'nombre' => ['String','min:3', 'max:250','required'],
            'tiempo' => ['required'],
            'salario' => ['numeric','required'],
            'descripcion' => ['required'],
            'entidad_id' => ['required'],
            'municipio_id' => ['required'],
            'colonia' => ['String','min:3', 'max:150','required'],
            'calle' => ['String','min:3', 'max:150','required'],
            'cp' => ['Integer','digits:5','required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        $oferta = Ofertas::find($id);
        $oferta->update($datos);
        return redirect('/ofertas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oferta = Ofertas::find($id);
        $oferta->estatus = 0;
        $oferta->save();
        return redirect('/ofertas');
    }

    public function vist_ofer(){
        $user = Auth::user();
        $tipo = $user->tipo_usuario_id;
        if ($tipo == 1) {
            return view('Ofertas.ofertas_a');
        }
        if ($tipo == 2) {
            $bane = count(Empresas_empleadores::where('empleador_id',$user->id)->get());
            if ($bane==0) {
                return view('mensaje.sin_empresa');
            }else{
                
                return view('Ofertas.ofertas_e');
            }
            
        }
        if ($tipo == 3) {
            $ban = count(Curriculums::where('candidato_id', $user->id)->where('estatus',1)->get());
                if ($ban==0) {
                    return view('mensaje.sin_curriculum');
                }else{
                    $user = Auth::user();
            $ofertas = Ofertas::where('estatus',1)->get();
            $favs = Postulaciones::where('candidato_id',$user->id)->where('estado',1)->get();
            $ban = false;
            $ban1 = false;
            $postulaciones = Postulaciones::where('candidato_id',$user->id)->where('estatus',1)->get();
            return view('Ofertas.ofertas_c')->with('ofertas',$ofertas)->with('favs',$favs)->with('ban',$ban)->with('postulaciones',$postulaciones)->with('ban1',$ban1);
                }
            
        }
    }
    public function index_a($btn)
    {
        if ($btn == 1) {
            $ofertas = Ofertas::where('estatus',1)->get();
            return view('Administrador.ofertas')->with('ofertas',$ofertas);
        }elseif ($btn == 2) {
            $ofertas = Ofertas::where('estatus',2)->get();
            return view('Administrador.ofertas')->with('ofertas',$ofertas);
        }
        
    }
}
