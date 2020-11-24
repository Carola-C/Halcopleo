<?php

namespace App\Http\Controllers\Auth;
use App\Users;
use App\Entidades;
use App\Tipos_usuarios;
use App\Municipios;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Session;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Storage;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest')->except('getLogout');
    }

    public function getlogin(){
        return view("login");

    }

    public function postlogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);
        $use = $request->email;
        $pass = $request->pass;
        
        $credentials = $request->only('email','password');
        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            $usuarioactual = \Auth::user();
            $user =$usuarioactual;
            //return redirect()->route('users.show',$usuarioactual->id)->with('user',$user);
            return view('inicio')->with("user", $user);
        }
        
        return view('mensaje.error_login');
    }

    public function getLogout(){
        $this->auth->logout();
        Session::flush();
        return redirect("login");
    }
    
    public function getRegister(){
        $entidades = Entidades::select('id','nombre')->orderBy('nombre')->get();
        //$municipios = Municipios::select('id','nombre','entidad_id')->orderBy('nombre')->get();
        $tipos_usuarios = Tipos_usuarios::select('id','nombre')->where('estatus',1)->orderBy('nombre')->get();
        return view("register")->with('entidades',$entidades)->with('tipos_usuarios', $tipos_usuarios);
    }

    public function postRegister(Request $request){
        
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
            /*
            
            'phone_number' => 'required',
            'type' => 'required|in:empresa,particular',
            'register' => 'required_if:type,empresa'
            */
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        /*
        $validate = $this->validate($request, [
            'nombre' => ['String', 'max:255','required'],
            'ap_pat' => ['String', 'max:255','required'],
            'ap_mat' => ['String', 'max:255','required'],
            'sexo' => ['numeric','required'],
            'telefono' => ['numeric','required'],
        ]);
        */
        $datos = $request->all();
        $rutaarchivos ="../storage/usuarios/";
        $hora =date("h:i:s");
        $fecha = date("d-m-Y");
        //$prefijo = $fecha."_".$hora;
        $archivo = $request->file("foto_ruta");
        //$input = array('file' => $archivo);
        //$reglas = array('file' => 'required|mimes:jpeg,png,gif|max:50000');
        //$ruta = $prefijo.'_'.$archivo->getClientOriginalName();
        $ruta = time().$archivo->getClientOriginalName();
        $r1 = Storage::disk('usuarios')->put($ruta, \File::get($archivo));
        if ($r1) {
            $datos['foto_ruta'] =$ruta;
            $pass = Hash::make($datos['password']);
        $datos['password'] = $pass;
        Users::create($datos);


        
        $credentials = $request->only('email','password');
        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            $usuarioactual = \Auth::user();
            $user =$usuarioactual;
            //return redirect()->route('users.show',$usuarioactual->id)->with('user',$user);
            return view('inicio')->with("user", $user);
        }else{
            return view('login');
        }

        
        } else {
            return view("mensaje.error_acceso")->with('mjs','No se pudo ingresar');
        }
        
        
        //return redirect('/users');
    }
    public function combo_municipios_x_entidad($entidad_id){
        $municipios = Municipios::select('id','nombre')->where('entidad_id',$entidad_id)->where('estatus',1)->get();
        return $municipios;
    }
}
