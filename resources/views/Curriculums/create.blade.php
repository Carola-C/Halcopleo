@extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Crear curriculum</h1>
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
                  {!! Form::open(['url'=>'/curriculums','enctype'=>'multipart/form-data']) !!}
                  <div class="form-group">
                      
                      {!! Form::hidden ('candidato_id',\Auth::user()->id,['placeholder'=>'Ingresa nombre de candidato_id','class'=>'form-control']) !!}
                      
                    </div>
                    <div class="form-group">
                      {!! Form::label ('foto_ruta','Imagen:') !!}
			{!! Form::file ('foto_ruta',null,['placeholder'=>'Ingresa una imagen','class'=>'form-control','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('grado_max_id','Último grado de estudios cursado:') !!}
			{!! Form::select ('grado_max_id',$grados_max_estudios->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('nombre_escuela','Nombre de escuela donde se curso el último grado de estudio:') !!}
			{!! Form::text ('nombre_escuela',null,['placeholder'=>'Ingresa nombre de escuela','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('descripcion_candidato','Coloca una breve descripción de tu persona:') !!}
			{!! Form::textarea ('descripcion_candidato',null,['placeholder'=>'Descripción','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',1,['placeholder'=>'Descripción','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Siguiente',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 