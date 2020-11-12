<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conocimientos;
use App\Curriculums;
use App\Conocimientos_curriculums;

class Conocimientos_curriculumsController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('usuarioCandidato');
    }
    public function index()
    {
        $conocimientos_curriculums = Conocimientos_curriculums::where('estatus',1)->get();
        return view('Conocimientos_curriculums.index')->with('conocimientos_curriculums',$conocimientos_curriculums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conocimientos = Conocimientos::where('estatus',1)->get();
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Conocimientos_curriculums.create')->with('conocimientos',$conocimientos)->with('curriculums',$curriculums);
    }


    
    
    public function store(Request $request)
    {
        $datos = $request->all();
        Conocimientos_curriculums::create($datos);
        return redirect('/conocimientos_curriculums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $conocimiento_curriculum = Conocimientos_curriculums::find($id);
        
        
        return view('Conocimientos_curriculums.read')->with('conocimiento_curriculum',$conocimiento_curriculum);
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conocimiento_curriculum = Conocimientos_curriculums::find($id);
        $conocimientos = Conocimientos::where('estatus',1)->get();
        $curriculums = Curriculums::where('estatus',1)->get();
        return view('Conocimientos_curriculums.edit')->with('conocimientos',$conocimientos)->with('curriculums',$curriculums)->with('conocimiento_curriculum',$conocimiento_curriculum);
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
        $conocimiento_curriculum = Conocimientos_curriculums::find($id);
        $conocimiento_curriculum->update($datos);
        return redirect('/conocimientos_curriculums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conocimiento_curriculum = Conocimientos_curriculums::find($id);
        $conocimiento_curriculum->estatus = 0;
        $conocimiento_curriculum->save();
        return redirect('/conocimientos_curriculums');
    }
}  
