<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Order;
use App\Mail\OrderShipped;
use App\Mail\Message;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarioAdmin');
    }
    public function create(){
    	return view("correo.formulario");
    }

    public function enviar(Request $request){
        $v = \Validator::make($request->all(), [
            'destinatario' => ['required','email'],
            'asunto' => ['String','required','max:255'],
            'contenido_mail' => ['required'],
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
    	$pathToFile="";
    	$containfile=false;

    	$destinatario= $request->input("destinatario");
    	$asunto = $request->input("asunto");
    	$contenido = $request->input("contenido_mail");

    	$data = array('contenido' => $contenido);
    	$r = Mail::send('correo.plantilla_correo', $data, function($message) use ($asunto,$destinatario, $containfile,$pathToFile){
    		$message->from('ccajeror@toluca.tecnm.mx', 'Halcopleo');
    		$message->to($destinatario)->subject($asunto);
    	});

    	if (!$r) {
    		return view("mensaje.email_enviado")->with('mjs','Se ha enviado el mensaje, presiona regresar para enviar otro');
    	} else {
    		return "no se envió";
    	}
    	
    }
}
