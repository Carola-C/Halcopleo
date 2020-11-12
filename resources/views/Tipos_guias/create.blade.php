@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Crear tipo de guía</h1>
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
                  {!! Form::open(['url'=>'/tipos_guias']) !!}
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre de guía') !!}
      {!! Form::text ('nombre',null,['placeholder'=>'Ingresa nombre del pais','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
      {!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),null,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar tipo de guía',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
      <br>
      
      <a class="botones" href="{!! asset('tipos_guias') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection()
