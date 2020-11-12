<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos_guias;
use App\Users;
use App\Guias;
use App\Guias_favoritas;
use Illuminate\Support\Facades\Auth;
class GuiasController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $guias = Guias::where('user_id',$user->id)->orderBy('id')->get();
        return view('Guias.index')->with('guias',$guias);
    }

    public function vist_guias(){
        $user = Auth::user();
        $tipo = $user->tipo_usuario_id;
        if ($tipo == 1) {
            return view('Guias.guias_a');
        }
        if ($tipo == 2) {
            //return view('Guias.guias_e');
            $guias = Guias::where('estatus',1)->orderBy('id')->get();
        return view('Guias.guias_e')->with('guias',$guias);
        }
        if ($tipo == 3) {
            $user = Auth::user();
            /*
            $ofertas = Ofertas::where('estatus',1)->get();
            $favs = Postulaciones::where('candidato_id',$user->id)->where('estado',1)->get();
            $ban = false;

            return view('Ofertas.ofertas_c')->with('ofertas',$ofertas)->with('favs',$favs)->with('ban',$ban);
            */
            $favs = Guias_favoritas::where('candidato_id',$user->id)->where('estatus',1)->get();
            $guias = Guias::where('estatus',1)->orderBy('id')->get();
            $ban = false;
        return view('Guias.index2')->with('guias',$guias)->with('favs',$favs)->with('ban',$ban);
        }
    }

    public function index_guias($btn)
    {
        if ($btn == 1) {
            $guias = Guias::where('estatus',1)->get();
            return view('Administrador.guias')->with('guias',$guias);
        }elseif ($btn == 2) {
            $guias = Guias::where('estatus',2)->get();
            return view('Administrador.guias')->with('guias',$guias);
        }
        
    }

    public function create()
    {
        $user = Auth::user();
        $users = Users::where('estatus',1)->get();
        $tipos_guias = Tipos_guias::where('estatus',1)->get();
        return view('Guias.create')->with('users',$users)->with('tipos_guias',$tipos_guias)->with('user',$user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $v = \Validator::make($request->all(), [
            'tipo_guia_id' => ['required'],
            'nombre' => ['String','min:3', 'max:250','required'],
            'descripcion' => ['required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        Guias::create($datos);
        if ($user->tipo_usuario_id ==2) {
            return redirect('/vist_guias');
        }
        if ($user->tipo_usuario_id ==3) {
            return redirect('/guias');
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
        $guia = Guias::find($id);
        return view('Guias.read')->with('guia',$guia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guia = Guias::find($id);
        $users = Users::where('estatus',1)->get();
        $tipos_guias = Tipos_guias::where('estatus',1)->get();
        return view('Guias.edit')->with('guia',$guia)->with('users',$users)->with('tipos_guias',$tipos_guias);
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
        $guia = Guias::find($id);
        $guia->update($datos);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guia =Guias::find($id);
        $guia->estatus = 0;
        $guia -> save();
        return redirect('/guias');
    }
}
