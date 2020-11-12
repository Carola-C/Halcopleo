@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar guias</h1>
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
                  {!! Form::open([ 'method' => 'PATCH' ,'url'=>'/guias/'.$guia->id]) !!}
                  	<div class="form-group">
                      
			{!! Form::hidden ('user_id',$guia->user_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tipo_guia_id','Tipo de guía') !!}
			{!! Form::select ('tipo_guia_id',$tipos_guias->pluck('nombre','id')->all(),$guia->tipo_guia_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre de guía') !!}
			{!! Form::text ('nombre',$guia->nombre,['placeholder'=>'Ingresa nombre','class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label ('descripcion','Descripción') !!}
			{!! Form::textarea ('descripcion',$guia->descripcion,['placeholder'=>'Descripción','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                    
      {!! Form::hidden ('estatus',$guia->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar guía',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('vist_guias') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection()
