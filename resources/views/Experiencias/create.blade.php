@extends('template.master') 
<script>
  function fecha(fecha){
    
    $("#tiempo_fin").attr("min",fecha);
    $("#tiempo_fin").attr("disabled",false);
  }
</script>
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Crear experiencia</h1>
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
                  
                  {!! Form::open(['url'=>'/experiencias']) !!}
                    <div class="form-group">
                      {!! Form::label ('nombre_lugar','Nombre de negocio/empresa:') !!}
			{!! Form::text ('nombre_lugar',null,['placeholder'=>'Ingresa el nombre','class'=>'form-control','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tiempo_inicio','Fecha de inicio') !!}
			{!! Form::date ('tiempo_inicio',null,['placeholder'=>'Ingresa fecha','class'=>'form-control','onchange'=>'fecha(this.value);','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tiempo_fin','Fecha de fin') !!}
			{!! Form::date ('tiempo_fin',null,['placeholder'=>'Ingresa fecha','class'=>'form-control','required'=>'required', 'disabled'=>'true']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('pais_id','Pais donde se realizó el trabajo:') !!}
			{!! Form::select ('pais_id',$paises->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','required'=>'required']) !!}
                    </div> 
                    <div class="form-group">
                      {!! Form::label ('ciudad','Ciudad:') !!}
			{!! Form::text ('ciudad',null,['placeholder'=>'Ingresar ciudad','class'=>'form-control','required'=>'required']) !!}
			
                    </div>
                    <div class="form-group">
			{!! Form::label ('cargo','Cargo ocupado:') !!}
			{!! Form::text ('cargo',null,['placeholder'=>'Ingresa el cargo','class'=>'form-control','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
			{!! Form::label ('descripcion','Breve explicación subre lo que se realizó:') !!}
			{!! Form::textarea ('descripcion',null,['placeholder'=>'Descripción','class'=>'form-control','required'=>'required']) !!}
                    </div>

                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',1,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar experiencia',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<!--<a class="botones" href="{!! asset('experiencias') !!}">Regresar a experiencias</a>-->
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 