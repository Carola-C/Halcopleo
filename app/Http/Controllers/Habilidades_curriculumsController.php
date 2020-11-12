<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculums;
use App\Habilidades;
use App\Habilidades_curriculums;
use App\Users;

class Habilidades_curriculumsController extends Controller
{
    public function __construct(){
        $this->middleware('usuarionEmp_Cand');
    }
    public function index()
    {
        $habilidades_curriculums = Habilidades_curriculums::where('estatus',1)->get();
        return view('Habilidades_curriculums.index')->with('habilidades_curriculums',$habilidades_curriculums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $habilidades = Habilidades::where('estatus',1)->get();
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Habilidades_curriculums.create')->with('habilidades',$habilidades)->with('curriculums',$curriculums);
    }


    
    
    public function store(Request $request)
    {
        $datos = $request->all();
        Habilidades_curriculums::create($datos);
        return redirect('/habilidades_curriculums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $habilidad_curriculum = Habilidades_curriculums::find($id);
        $curriculum = Curriculums::where('id',$habilidad_curriculum->curriculum_id)->get();
        
        return view('Habilidades_curriculums.read')->with('habilidad_curriculum',$habilidad_curriculum);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habilidad_curriculum = Habilidades_curriculums::find($id);
        $habilidades = Habilidades::where('estatus',1)->get();
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Habilidades_curriculums.edit')->with('habilidades',$habilidades)->with('curriculums',$curriculums)->with('habilidad_curriculum',$habilidad_curriculum);
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
        $habilidad_curriculum = Habilidades_curriculums::find($id);
        $habilidad_curriculum->update($datos);
        return redirect('/habilidades_curriculums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habilidad_curriculum = Habilidades_curriculums::find($id);
        $habilidad_curriculum->estatus = 0;
        $habilidad_curriculum->save();
        return redirect('/habilidades_curriculums');
    }
} 
