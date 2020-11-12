@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar favorito</h1>
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
                	{!! Form::open([ 'method' => 'PATCH' ,'url'=>'/guias_favoritas/'.$guia_favorita->id]) !!}
                  

                    <div class="form-group">
                      {!! Form::label ('candidato_id','Usuario') !!}
			{!! Form::select ('candidato_id',$users->pluck('nombre','id')->all(),$guia_favorita->candidato_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('guia_id','Guía') !!}
			{!! Form::select ('guia_id',$guias->pluck('nombre','id')->all(),$guia_favorita->guia_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),$guia_favorita->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar tipo de oferta',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('guias_favoritas') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection()
