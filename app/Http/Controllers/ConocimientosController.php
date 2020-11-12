<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conocimientos;

class ConocimientosController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
        $conocimientos = Conocimientos::where('estatus',1)->orderBy('nombre')->get();
        return view('Conocimientos.index')->with('conocimientos',$conocimientos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Conocimientos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), [
           'estatus' => ['required'],
            'nombre' => ['String','min:3', 'max:250','required'],
            
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos = $request->all();
        Conocimientos::create($datos);
        return redirect('/conocimientos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conocimiento = Conocimientos::find($id);
        return view('Conocimientos.read')->with('conocimiento',$conocimiento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conocimiento = Conocimientos::find($id);
        return view('Conocimientos.edit')->with('conocimiento',$conocimiento);
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
        $v = \Validator::make($request->all(), [
           'estatus' => ['required'],
            'nombre' => ['String','min:3', 'max:250','required'],
            
        ]);

 
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $datos =$request->all();
        $conocimiento = Conocimientos::find($id);
        $conocimiento->update($datos);
        return redirect('/conocimientos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conocimiento =Conocimientos::find($id);
        $conocimiento->estatus = 0;
        $conocimiento -> save();
        return redirect('/conocimientos');
    }
}
