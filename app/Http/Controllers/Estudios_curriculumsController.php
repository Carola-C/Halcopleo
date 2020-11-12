<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudios;
use App\Curriculums;
use App\Estudios_curriculums;

class Estudios_curriculumsController extends Controller
{
    public function __construct(){
        $this->middleware('usuarionEmp_Cand');
    }
    public function index()
    {
        $estudios_curriculums = Estudios_curriculums::where('estatus',1)->get();
        return view('Estudios_curriculums.index')->with('estudios_curriculums',$estudios_curriculums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudios = Estudios::where('estatus',1)->get();
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Estudios_curriculums.create')->with('estudios',$estudios)->with('curriculums',$curriculums);
    }


    
    
    public function store(Request $request)
    {
        $datos = $request->all();
        Estudios_curriculums::create($datos);
        return redirect('/estudios_curriculums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $estudio_curriculum = Estudios_curriculums::find($id);
        return view('Estudios_curriculums.read')->with('estudio_curriculum',$estudio_curriculum);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudio_curriculum = Estudios_curriculums::find($id);
        $estudios = Estudios::where('estatus',1)->get();
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Estudios_curriculums.edit')->with('estudios',$estudios)->with('curriculums',$curriculums)->with('estudio_curriculum',$estudio_curriculum);
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
        $estudio_curriculum = Estudios_curriculums::find($id);
        $estudio_curriculum->update($datos);
        return redirect('/estudios_curriculums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudio_curriculum = Estudios_curriculums::find($id);
        $estudio_curriculum->estatus = 0;
        $estudio_curriculum->save();
        $id_e = $estudio_curriculum->estudio_id;
        $estudio = Estudios::find($id_e);
        $estudio->estatus = 0;
        $estudio->save();
        return redirect()->back();
    }
}  
