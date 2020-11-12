@extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar prestación-oferta</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="block">
                	{!! Form::open([ 'method' => 'PATCH' ,'url'=>'/prestaciones_ofertas/'.$prestacion_oferta->id]) !!}
                  

                    
       
                    
                    <div class="form-group">
                      {!! Form::label ('prestacion_id','Prestación:') !!}
			{!! Form::select ('prestacion_id',$prestaciones->pluck('nombre','id')->all(),$prestacion_oferta->prestacion_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('oferta_id','Ofertas:') !!}
			{!! Form::select ('oferta_id',$ofertas->pluck('nombre','id')->all(),$prestacion_oferta->oferta_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),$prestacion_oferta->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar pretación-oferta',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('prestaciones_ofertas') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 