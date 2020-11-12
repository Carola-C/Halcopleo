@extends('template.master')   
<script>
  function llenar_municipios(entidad_id){
    $("#municipio_id").empty();
    var asset = '{{ asset('') }}'
    var ruta = asset+'combo_municipios_x_entidad1/'+entidad_id;
    $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var municipios = data;
              for (var i = 0; i < municipios.length; i++) {
                $('#municipio_id').append('<option value="'+ municipios[i].id + '">'+ municipios[i].nombre+ '</option>');
              }
            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
    })
  }
</script>  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Crear empresas</h1>
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
                  {!! Form::open(['url'=>'/empresas']) !!}
                    <div class="form-group">
                      {!! Form::label ('razon_social','Nombre:') !!}
			{!! Form::text ('razon_social',null,['placeholder'=>'Ingresa nombre','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('rfc','RFC:') !!}
			{!! Form::text ('rfc',null,['placeholder'=>'Ingresa RFC','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                     
                    <div class="form-group">
                      {!! Form::label ('entidad_id','Entidad:') !!}
			{!! Form::select ('entidad_id',$entidades->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control','onchange'=>'llenar_municipios(this.value);','required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('municipio_id','Municipio:') !!}
			{!! Form::select ('municipio_id',$municipios->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('colonia','Colonia:') !!}
			{!! Form::text ('colonia',null,['placeholder'=>'Ingresa tu colonia','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('calle','Calle:') !!}
			{!! Form::text ('calle',null,['placeholder'=>'Ingresa tu calle','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('no_edificio','Número:') !!}
			{!! Form::number ('no_edificio',null,['placeholder'=>'Ingresa número de eficicio','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('cp','Código postal:') !!}
			{!! Form::text ('cp',null,['placeholder'=>'Ingresa código postal','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    

                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',1,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar Empresa',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('empresas') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 