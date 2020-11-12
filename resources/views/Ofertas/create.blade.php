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
                  <h1>Crear oferta</h1>
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
                  
                  
                  {!! Form::open(['url'=>'/ofertas']) !!}

                  	<div class="form-group">
                      
			{!! Form::hidden ('empresa_id',$empresas->empresa_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!} 
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tipo_oferta_id','Tipo de oferta:') !!}
			{!! Form::select ('tipo_oferta_id',$tipos_ofertas->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre:') !!}
			{!! Form::text ('nombre',null,['placeholder'=>'Ingresa nombre de empleo','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tiempo','Tiempo') !!}
			{!! Form::select ('tiempo',array('Medio tiempo'=>'Medio tiempo','Tiempo completo'=>'Tiempo completo','Mixto'=>'Mixto'),null,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('salario','Salario:') !!}
			{!! Form::text ('salario',null,['placeholder'=>'Ingresa salario','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('descripcion','Descripción:') !!}
			{!! Form::textarea ('descripcion',null,['placeholder'=>'Descripción','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
       				
                    <div class="form-group">
                      {!! Form::label ('entidad_id','Entidad:') !!}
      {!! Form::select ('entidad_id',$entidades->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control','onchange'=>'llenar_municipios(this.value);', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('municipio_id','Municipio:') !!}
      {!! Form::select ('municipio_id', array(''=>'Seleccionar'),null,['class'=>'form-control', 'required'=>'required']) !!}
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
			{!! Form::number ('no_edificio',null,['placeholder'=>'Ingresa número de edificio','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('cp','Código postal:') !!}
			{!! Form::number ('cp',null,['placeholder'=>'Ingresa código postal','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    

                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',2,['placeholder'=>'Ingresa código postal','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      <h1>Prestaciones</h1>
                    @foreach($prestaciones as $prestacion)
                    
                    <input id="prestacionA" type="checkbox" name="prestacionA[]" value="{{$prestacion->id}}">
                    <label>{{$prestacion->nombre}}:</label><br>
                    <label>{{$prestacion->descripcion}}</label><br>
                    
                    @endforeach
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar oferta',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('vist_ofer') !!}">Regresar</a>
                </div>
              </div>



              
            </div>

          </div>
        </section>
@endsection() 
 