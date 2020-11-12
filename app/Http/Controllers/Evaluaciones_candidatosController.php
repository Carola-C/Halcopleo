<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Postulaciones;
use App\Evaluaciones_candidatos;
use Storage;
use App\Order;
use App\Mail\OrderShipped;
use App\Mail\Message;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class Evaluaciones_candidatosController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioEmpleador');
    }
    public function index()
    {
        $evaluaciones_candidatos = Evaluaciones_candidatos::where('estatus',1)->get();
        return view('Evaluaciones_candidatos.index')->with('evaluaciones_candidatos',$evaluaciones_candidatos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postulaciones = Postulaciones::where('estatus',1)->get();
        
        return view('Evaluaciones_candidatos.create')->with('postulaciones',$postulaciones);
    }


    
    
    public function store(Request $request)
    {
            $v = \Validator::make($request->all(), [
            
            'calificacion' => ['numeric','required'],
            'comentario' => ['required'],
            
            ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        $postulacion = Postulaciones::where('id',$request->postulacion_id)->first();
        

        $pathToFile="";
        $containfile=false;
        $destinatario= $request->input("email_c");
        $asunto = "Respuesta de postulación"; 
        $tipo ="Su postulación ha sido contestada";
        $oferta = $postulacion->ofertas->nombre;
        $empresa = $postulacion->ofertas->empresas->razon_social;
        $contenido = $request->comentario;

        $data = array('tipo' => $tipo,'oferta' => $oferta,'empresa' => $empresa,'contenido' => $contenido);
        $r = Mail::send('correo.plantilla_correo_em', $data, function($message) use ($asunto,$destinatario, $containfile,$pathToFile){
            $message->from('ccajeror@toluca.tecnm.mx', 'Halcopleo');
            $message->to($destinatario)->subject($asunto);
        });
        
        if (!$r) {
            Evaluaciones_candidatos::create([
            'postulacion_id'=> $request->postulacion_id,
            'calificacion'=> $request->calificacion,
            'comentario'=> $request->comentario,
            'estatus'=> 1
        ]);
            return redirect()->back();
        } else {
            return "no se envió";
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
        $evaluacion_candidato = Evaluaciones_candidatos::find($id);
        
        
        return view('Evaluaciones_candidatos.read')->with('evaluacion_candidato',$evaluacion_candidato);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluacion_candidato = Evaluaciones_candidatos::find($id);
        $postulaciones = Postulaciones::where('estatus',1)->get();
        
        return view('Evaluaciones_candidatos.edit')->with('postulaciones',$postulaciones)->with('evaluacion_candidato',$evaluacion_candidato);
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
        $evaluacion_candidato = Evaluaciones_candidatos::find($id);
        $evaluacion_candidato->update($datos);
        return redirect('/evaluaciones_candidatos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evaluacion_candidato = Evaluaciones_candidatos::find($id);
        $evaluacion_candidato->estatus = 0;
        $evaluacion_candidato->save();
        return redirect('/evaluaciones_candidatos');
    }
} 
