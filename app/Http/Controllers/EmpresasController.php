<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Empresas;
use App\Entidades;
use App\Municipios;
use App\Empresas_empleadores;
use App\Ofertas;
class EmpresasController extends Controller
{
    public function __construct(){
        $this->middleware('usuarionoRegis');
    }
    public function index()
    {
        $empresas = Empresas::where('estatus',1)->orderBy('razon_social')->get();
        return view('Empresas.index')->with('empresas',$empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entidades = Entidades::select('id','nombre')->orderBy('nombre')->where('estatus',1)->get();
        $municipios = Municipios::select('id','nombre','entidad_id')->orderBy('nombre')->where('estatus',1)->get();
        
        return view('Empresas.create')->with('entidades',$entidades)->with('municipios',$municipios);
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
            'razon_social' => ['String','min:3', 'max:250','required'],
            'rfc' => ['String','min:12','max:12','required','unique:App\Empresas,rfc'],
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
        $empresa=Empresas::create($datos);
        $user = Auth::user();
        if($user->tipo_usuario_id ==1){
            return redirect('/empresas');
        }
        if($user->tipo_usuario_id ==2){
            $unir_em = new Empresas_empleadores();
        $unir_em->empresa_id = $empresa->id;
        $unir_em->empleador_id = $user->id;
        $unir_em->estatus = 1;
        $unir_em->save();
            return redirect('/empresa_ini');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresas::find($id);
        return view('Empresas.read')->with('empresa',$empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresas::find($id);
        $entidades = Entidades::select('id','nombre')->orderBy('nombre')->get();
        $municipios = Municipios::select('id','nombre','entidad_id')->orderBy('nombre')->get();
        
        return view('Empresas.edit')->with('empresa',$empresa)->with('entidades',$entidades)->with('municipios',$municipios);
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
            'razon_social' => ['String','min:3', 'max:250','required'],
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
        $empresa = Empresas::find($id);
        if ($empresa->rfc === $request->rfc) {
            $datos = $request->all();
        
        $empresa->update($datos);
        return redirect('/empresas');
        }else{
            $v = \Validator::make($request->all(), [
            'razon_social' => ['String','min:3', 'max:250','required'],
            'rfc' => ['String','min:12','max:12','required','unique:App\Empresas,rfc'],
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
        
        $empresa->update($datos);
        return redirect('/empresas');

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
        $empresa = Empresas::find($id);
        $empresa->estatus = 0;
        $empresa->save();
        $empleadores = Empresas_empleadores::where('empresa_id',$id)->get();

        foreach ($empleadores as $empleador) {
            $empleador->estatus = 0;
            $empleador->save();
        }
        $ofertas = Ofertas::where('empresa_id',$id)->get();
        foreach ($ofertas as $oferta) {
            $oferta->estatus = 0;
            $oferta->save();
        }
        return redirect('/empresas');
    }
    
}
