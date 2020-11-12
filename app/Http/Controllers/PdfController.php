<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Request;
use App\Http\Controllers\Controller;
use App\Empresas;
use App\Ofertas;
use App\Empresas_empleadores;
use App\Guias;
use App\Guias_favoritas;

class PdfController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarioAdmin');
    }
    public function reportes(){
        /*
    	$empresas = Empresas::orderBy('id')->get();
    	$oferta = Ofertas::orderBy('id')->get();
    	$date = date('d-m-Y');
    	return view('pdf.reporte_emp_ofert')->with('empresas',$empresas)->with('oferta',$oferta)->with('date',$date);
        */
    	return view('pdf.reportes');
    }

    public function crearPDF($emmpresas, $ofertas,$vistaurl, $tipo){
    	$empresas = $emmpresas;
    	$date = date('d-m-Y');
    	$oferta = $ofertas;
    	$view =\View::make($vistaurl,compact('empresas','oferta','date'))->render();
    	$pdf = \App::make('dompdf.wrapper');
    	$pdf->loadHTML($view);
    	if ($tipo == 1) {
    		return $pdf->stream('reporte');
    	}
    	if ($tipo == 2) {
    		return $pdf->download('reporte.pdf');
    	}
    }

    public function crear_reporte_ofer_emp($tipo){
    	$vistaurl = "pdf.reporte_emp_ofert";
    	$emmpresas = Empresas:: where('estatus',1)->get();
    	$ofertas = Ofertas::orderBy('id')->get();
    	return $this->crearPDF($emmpresas,$ofertas,$vistaurl,$tipo);
    }

    public function crear_reporte_empresas($tipo){
        $vistaurl = "pdf.reporte_empresas";
        $emmpresas = Empresas:: where('estatus',1)->get();
        $empleadores = Empresas_empleadores::orderBy('empresa_id')->orWhere('estatus',1)->orWhere('estatus',0)->get();
        //return $this->crearPDF1($empleadores,$vistaurl,$tipo);
        return $this->crearPDF1($emmpresas,$empleadores,$vistaurl,$tipo);
    }
    public function crearPDF1($emmpresas,$empleadores,$vistaurl, $tipo){
        $empresas = $emmpresas;
        $date = date('d-m-Y');
        $empleadors = $empleadores;
        $view =\View::make($vistaurl,compact('empresas','empleadors','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        if ($tipo == 1) {
            return $pdf->stream('reporte');
        }
        if ($tipo == 2) {
            return $pdf->download('reporte.pdf');
        }
    }

    public function crear_reporte_guias($tipo){
        $vistaurl = "pdf.reporte_guias";
        $guiass = Guias:: where('estatus',1)->get();
        $guias_favss = Guias_favoritas::orderBy('id')->where('estatus',1)->get();
        return $this->crearPDF2($guiass,$guias_favss,$vistaurl,$tipo);
    }

    public function crearPDF2($guiass,$guias_favss,$vistaurl, $tipo){
        $guias = $guiass;
        $date = date('d-m-Y');
        $guias_favs = $guias_favss;
        $view =\View::make($vistaurl,compact('guias','guias_favs','date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        if ($tipo == 1) {
            return $pdf->stream('reporte');
        }
        if ($tipo == 2) {
            return $pdf->download('reporte.pdf');
        }
    }
}
