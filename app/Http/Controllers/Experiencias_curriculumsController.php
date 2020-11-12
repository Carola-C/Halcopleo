<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculums;
use App\Experiencias;
use App\Experiencias_curriculums;

class Experiencias_curriculumsController extends Controller
{
    public function __construct(){
        $this->middleware('usuarionEmp_Cand');
    }
    public function index()
    {
        $experiencias_curriculums = Experiencias_curriculums::where('estatus',1)->get();
        return view('Experiencias_curriculums.index')->with('experiencias_curriculums',$experiencias_curriculums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experiencias = Experiencias::where('estatus',1)->get();
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Experiencias_curriculums.create')->with('experiencias',$experiencias)->with('curriculums',$curriculums);
    }


    
    
    public function store(Request $request)
    {
        $datos = $request->all();
        Experiencias_curriculums::create($datos);
        return redirect('/experiencias_curriculums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $experiencia_curriculum = Experiencias_curriculums::find($id);
        
        
        return view('Experiencias_curriculums.read')->with('experiencia_curriculum',$experiencia_curriculum);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiencia_curriculum = Experiencias_curriculums::find($id);
        $experiencias = Experiencias::where('estatus',1)->get();
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Experiencias_curriculums.edit')->with('experiencias',$experiencias)->with('curriculums',$curriculums)->with('experiencia_curriculum',$experiencia_curriculum);
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
        $experiencia_curriculum = Experiencias_curriculums::find($id);
        $experiencia_curriculum->update($datos);
        return redirect('/experiencias_curriculums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiencia_curriculum = Experiencias_curriculums::find($id);
        $experiencia_curriculum->estatus = 0;
        $experiencia_curriculum->save();
        return redirect('/experiencias_curriculums');
    }
}  
