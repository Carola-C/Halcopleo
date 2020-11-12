<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Guias;
use Illuminate\Support\Facades\Auth;
use App\Guias_favoritas;

class Guias_favoritasController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioCandidato');
    }
    public function index()
    {
        $user = Auth::user();
        $guias_favoritas = Guias_favoritas::where('estatus',1)->where('candidato_id', $user->id)->get();
        return view('Guias_favoritas.index')->with('guias_favoritas',$guias_favoritas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Users::where('estatus',1)->where('tipo_usuario_id',3)->get();
        $guias = Guias::where('estatus',1)->get();
        return view('Guias_favoritas.create')->with('users',$users)->with('guias',$guias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->all();
        Guias_favoritas::create($datos);
        return redirect('/guias_favoritas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guia_favorita = Guias_favoritas::find($id);
        return view('Guias_favoritas.read')->with('guia_favorita',$guia_favorita);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guia_favorita = Guias_favoritas::find($id);
        $users = Users::where('estatus',1)->get();
        $guias = Guias::where('estatus',1)->get();
        return view('Guias_favoritas.edit')->with('guia_favorita',$guia_favorita)->with('users',$users)->with('guias',$guias);
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
        $datos =$request->all();
        $guia_favorita = Guias_favoritas::find($id);
        $guia_favorita->update($datos);
        return redirect('/guias_favoritas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guia_favorita =Guias_favoritas::find($id);
        $guia_favorita->estatus = 0;
        $guia_favorita -> save();
        return redirect('/guias_favoritas');
    }
}
