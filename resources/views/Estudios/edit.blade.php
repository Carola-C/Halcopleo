@extends('template.master') 
<script>
  function fecha(fecha){
    
    $("#fecha_fin").attr("min",fecha);
    
  }
</script>
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar estudio</h1>
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
                	{!! Form::open([ 'method' => 'PATCH' ,'url'=>'/estudios/'.$estudio->id]) !!}
                  
                  <div class="form-group">
                      {!! Form::label ('fecha_inicio','Fecha de inicio') !!}
			{!! Form::date ('fecha_inicio',$estudio->fecha_inicio,['placeholder'=>'Ingresa fecha','class'=>'form-control','onchange'=>'fecha(this.value);','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('fecha_fin','Fecha de fin') !!}
			{!! Form::date ('fecha_fin',$estudio->fecha_fin,['placeholder'=>'Ingresa fecha','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
			{!! Form::label ('titulo','Título recibido:') !!}
			{!! Form::text ('titulo',$estudio->titulo,['placeholder'=>'Ingresa el título','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('nombre_escuela','Nombre de escuela:') !!}
			{!! Form::text ('nombre_escuela',$estudio->nombre_escuela,['placeholder'=>'Ingresa el nombre de escuela','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('ciudad','Ciudad:') !!}
			{!! Form::text ('ciudad',$estudio->ciudad,['placeholder'=>'Ingresar ciudad','class'=>'form-control', 'required'=>'required']) !!}
			
                    </div>

                    
                    <div class="form-group">
                      {!! Form::label ('pais_id','Pais:') !!}
			{!! Form::select ('pais_id',$paises->pluck('nombre','id')->all(),$estudio->pais_id,['placeholder'=>'Seleccionar', 'required'=>'required']) !!}
                    </div> 
                    
                    

                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',$estudio->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar estudio',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			 <a class="botones" href="{!! asset('curriculum/'.$curriculum_id->id) !!}">Regresar</a> 
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 