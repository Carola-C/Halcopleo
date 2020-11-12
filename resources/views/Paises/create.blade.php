@extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Crear pais</h1>
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
                  {!! Form::open(['url'=>'/paises']) !!}
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre del pais') !!}
			{!! Form::text ('nombre',null,['placeholder'=>'Ingresa nombre del pais','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('clave','Clave del pais') !!}
			{!! Form::text ('clave',null,['placeholder'=>'Ingresa clave del pais','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',1,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar Pais',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('paises') !!}">Regresar a paises</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection()