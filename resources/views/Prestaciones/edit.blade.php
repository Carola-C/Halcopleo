@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar prestación</h1>
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
                	{!! Form::open([ 'method' => 'PATCH' ,'url'=>'/prestaciones/'.$prestacion->id]) !!}
                  
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre de prestacion') !!}
			{!! Form::text ('nombre',$prestacion->nombre,['placeholder'=>'Ingresa nombre','class'=>'form-control', 'required'=>'required']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label ('descripcion','Descripción:') !!}
			{!! Form::textarea ('descripcion',$prestacion->descripcion,['placeholder'=>'Ingresa descripcion','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),$prestacion->estatus,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar prestación',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('prestaciones') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection()
