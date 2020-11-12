@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar municipio</h1>
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
                  {!! Form::open([ 'method' => 'PATCH' ,'url'=>'/municipios/'.$municipio->id]) !!}
                    <div class="form-group">
                      {!! Form::label ('entidad_id','Entidad:') !!}
			{!! Form::select ('entidad_id',$entidades->pluck('nombre','id')->all(),$municipio->entidad_id,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre del municipio') !!}
			{!! Form::text ('nombre',$municipio->nombre,['placeholder'=>'Ingresa nombre del municipio','class'=>'form-control', 'required'=>'required']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),$municipio->estatus,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar municipio',['class'=>'botones']) !!} 
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('municipios') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection()



