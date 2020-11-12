<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Empresas_empleadores;
use App\Empresas;
use App\Users;

class Empresas_empleadoresController extends Controller
{
    public function __construct(){
        $this->middleware('usuarionoRegis');
    }
    public function index()
    {
        $empresas_empleadores = Empresas_empleadores::where('estatus',1)->get();
        return view('Empresas_empleadores.index')->with('empresas_empleadores',$empresas_empleadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresas::where('estatus',1)->get();
        $users = Users::where('estatus',1)->where('tipo_usuario_id',2)->get();
        return view('Empresas_empleadores.create')->with('empresas',$empresas)->with('users',$users);
    }
    public function create1($id)
    {
        $unir_em = new Empresas_empleadores();
        $unir_em->empresa_id = $id;
        $unir_em->empleador_id = Auth::user()->id;
        $unir_em->estatus = 1;
        $unir_em->save();
        return redirect()->route('empresa_ini');
    }


    
    
    public function store(Request $request)
    {
        $datos = $request->all();
        Empresas_empleadores::create($datos);
        return redirect('/empresas_empleadores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $empresa_empleador = Empresas_empleadores::find($id);
        return view('Empresas_empleadores.read')->with('empresa_empleador',$empresa_empleador);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa_empleador = Empresas_empleadores::find($id);
        $empresas = Empresas::where('estatus',1)->get();
        $users = Users::where('estatus',1)->get();
        return view('Empresas_empleadores.edit')->with('empresas',$empresas)->with('users',$users)->with('empresa_empleador',$empresa_empleador);
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
        $empresa_empleador = Empresas_empleadores::find($id);
        $empresa_empleador->update($datos);
        return redirect('/empresas_empleadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa_empleador = Empresas_empleadores::find($id);
        $empresa_empleador->estatus = 0;
        $empresa_empleador->save();
        return redirect('/empresas_empleadores');
    }

    public function empresa_ini(){
        $user = Auth::user();
        $empresa_em = Empresas_empleadores::where('empleador_id',$user->id)->where('estatus',1)->first();
        $empresas = Empresas::where('estatus',1)->get();
        if ($empresa_em == null) {
            $ban =0;
            return view('Empleador.empresa_emp')->with('ban',$ban)->with('empresas',$empresas);
        } else {
            $ban = 1;
            $em = Empresas_empleadores::select('empresa_id')->where('empleador_id',$user->id)->get();
            //$id = $em->empresa_id;
            $empresas = Empresas::find($em);
            return view('Empleador.empresa_emp')->with('ban',$ban)->with('empresas',$empresas);
        }
        
    }
}  
