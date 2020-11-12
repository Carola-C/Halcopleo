@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Crear guias</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
  <section id="contact-form">
          <div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  {!! Form::open(['url'=>'/guias']) !!}
                  	<div class="form-group">
                      
			{!! Form::hidden ('user_id',$user->id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tipo_guia_id','Tipo de guía') !!}
			{!! Form::select ('tipo_guia_id',$tipos_guias->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre de guía') !!}
			{!! Form::text ('nombre',null,['placeholder'=>'Ingresa nombre','class'=>'form-control', 'required'=>'required']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label ('descripcion','Descripción') !!}
			{!! Form::textarea ('descripcion',null,['placeholder'=>'Descripción','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',2,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
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
