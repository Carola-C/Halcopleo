<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipos_usuarios;
use App\Users;
use App\Municipios;
use App\Entidades;
use App\Paises;
use Storage;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
        $users = Users::where('estatus',1)->orderBy('nombre')->orderBy('tipo_usuario_id')->get();
        return view('Users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entidades = Entidades::select('id','nombre')->orderBy('nombre')->get();
        //$municipios = Municipios::select('id','nombre','entidad_id')->orderBy('nombre')->get();
        $tipos_usuarios = Tipos_usuarios::select('id','nombre')->where('estatus',1)->orderBy('nombre')->get();
        
        return view('Users.create')->with('entidades',$entidades)->with('tipos_usuarios',$tipos_usuarios);
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
        Users::create($datos);
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Users::find($id);
        return view('Users.read')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Users::find($id);
        $entidades = Entidades::select('id','nombre')->orderBy('nombre')->get();
        $municipios = Municipios::select('id','nombre','entidad_id')->orderBy('nombre')->get();
        $tipos_usuarios = Tipos_usuarios::select('id','nombre')->orderBy('nombre')->get();
        return view('Users.edit')->with('user',$user)->with('entidades',$entidades)->with('municipios',$municipios)->with('tipos_usuarios',$tipos_usuarios);
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
        /*
        $v = \Validator::make($request->all(), [
            
            'nombre' => ['String','min:3', 'max:150','required'],
            'ap_pat' => ['String','min:3', 'max:150','required'],
            'ap_mat' => ['String','min:3', 'max:150','required'],
            'sexo' => ['required'],
            'telefono' => ['Integer','min:7','required'],
            'fecha_nac' => ['date','required'],
            //'email'    => 'required|email|unique:users',
            //'password'    => ['required', 'min:6'],
            'entidad_id' => ['required'],
            'municipio_id' => ['required'],
            'calle' => ['String','min:3', 'max:150','required'],
            'colonia' => ['String','min:3', 'max:150','required'],
            'calle' => ['String','min:3', 'max:150','required'],
            'cp' => ['Integer','digits:5','required'],
            'tipo_usuario_id' => ['required'],
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        */
        $user = Users::find($id);
        $datos = $request->all();

        if ($request->email == $user->email) {
            $v = \Validator::make($request->all(), [
            
            'nombre' => ['String','min:3', 'max:150','required'],
            'ap_pat' => ['String','min:3', 'max:150','required'],
            'ap_mat' => ['String','min:3', 'max:150','required'],
            'sexo' => ['required'],
            'telefono' => ['Integer','min:7','required'],
            'fecha_nac' => ['date','required'],
            'entidad_id' => ['required'],
            'municipio_id' => ['required'],
            'colonia' => ['String','min:3', 'max:150','required'],
            'calle' => ['String','min:3', 'max:150','required'],
            'foto_ruta' => ['required','image'],
            'cp' => ['Integer','digits:5','required'],
            'tipo_usuario_id' => ['required'],
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
            //$pass = Hash::make($datos['password']);
        $datos['password'] = $user->password;
        $user->update($datos);
        return redirect('ver_perfil');
        }else{
            $v = \Validator::make($request->all(), [
            
            'nombre' => ['String','min:3', 'max:150','required'],
            'ap_pat' => ['String','min:3', 'max:150','required'],
            'ap_mat' => ['String','min:3', 'max:150','required'],
            'sexo' => ['required'],
            'telefono' => ['Integer','min:7','required'],
            'fecha_nac' => ['date','required'],
            'email'    => 'required|email|unique:users',
            'password'    => ['required', 'min:6'],
            'entidad_id' => ['required'],
            'municipio_id' => ['required'],
            'colonia' => ['String','min:3', 'max:150','required'],
            'calle' => ['String','min:3', 'max:150','required'],
            'foto_ruta' => ['required','image'],
            'cp' => ['Integer','digits:5','required'],
            'tipo_usuario_id' => ['required'],
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }



            $rutaarchivos ="../storage/usuarios/";
        $hora =date("h:i:s");
        $fecha = date("d-m-Y");
        $prefijo = $fecha."_".$hora;
        $archivo = $request->file("foto_ruta");
        //$input = array('file' => $archivo);
        //$reglas = array('file' => 'required|mimes:jpeg,png,gif|max:50000');
        $ruta = $prefijo.'_'.$archivo->getClientOriginalName();
        $r1 = Storage::disk('usuarios')->put($ruta, \File::get($archivo));
        if ($r1) {
            $datos['foto_ruta'] =$ruta;
            //$pass = Hash::make($datos['password']);
        $datos['password'] = $user->password;
        $user->update($datos);
        return redirect('ver_perfil');
        }
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
        $user = Users::find($id);
        $user->estatus = 0;
        $user->save();
        return redirect('/users');
    }
}
