@extends('template.master') 
<script>
  function fecha(fecha){
    
    $("#fecha_fin").attr("min",fecha);
    $("#fecha_fin").attr("disabled",false);
    
  }
</script>
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Crear estudio</h1>
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
                  {!! Form::open(['url'=>'/estudios']) !!}
                  <div class="form-group">
                      {!! Form::label ('fecha_inicio','Fecha de inicio') !!}
			{!! Form::date ('fecha_inicio',null,['placeholder'=>'Ingresa fecha','class'=>'form-control','onchange'=>'fecha(this.value);','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('fecha_fin','Fecha de fin') !!}
			{!! Form::date ('fecha_fin',null,['placeholder'=>'Ingresa fecha','class'=>'form-control','required'=>'required', 'disabled'=>'true']) !!}
                    </div>
                    <div class="form-group">
			{!! Form::label ('titulo','Título recibido:') !!}
			{!! Form::text ('titulo',null,['placeholder'=>'Ingresa el título','class'=>'form-control','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('nombre_escuela','Nombre de escuela:') !!}
			{!! Form::text ('nombre_escuela',null,['placeholder'=>'Ingresa el nombre de escuela','class'=>'form-control','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('ciudad','Ciudad:') !!}
			{!! Form::text ('ciudad',null,['placeholder'=>'Ingresar ciudad','class'=>'form-control','required'=>'required']) !!}
			
                    </div>

                    
                    <div class="form-group">
                      {!! Form::label ('pais_id','Pais:') !!}
			{!! Form::select ('pais_id',$paises->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','required'=>'required']) !!}
                    </div> 
                    
                    

                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',1,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar estudio',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<!--<a class="botones" href="{!! asset('estudios') !!}">Regresar</a>-->
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 