@extends('template.master')
<script>
  function ejecutar2(id){
    
    var selected ='0';
    var noselected = '0';
    $('#form2id input[type=checkbox]').each(function(){
        if (this.checked) {
            selected+=','+$(this).val();
        }else{
          noselected+=','+$(this).val();
        }
        
    });

    
    if (selected !='0') {
      var asset = '{{ asset('') }}'
      var ruta = asset+'agregar_prestacion/'+selected+'/'+noselected+'/'+id;
      
      $.ajax({
              type: 'GET',
              url: ruta,
              success: function(data){
                
                $( "#mjs" ).html( "<h1>Se modifcaron las prestaciones</h1>" );

              },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
      })

    } else {
      alert('Debes seleccionar al menos una opción.');
      
    }
    return false;
    
  }
</script> 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar oferta</h1>
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
                	{!! Form::open([ 'method' => 'PATCH' ,'url'=>'/ofertas/'.$oferta->id]) !!}
                  

                  	<div class="form-group">
                      {!! Form::label ('empresa_id','Empresa:') !!}
			{!! Form::select ('empresa_id',$empresas->pluck('razon_social','id')->all(),$oferta->empresa_id,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tipo_oferta_id','Tipo de oferta:') !!}
			{!! Form::select ('tipo_oferta_id',$tipos_ofertas->pluck('nombre','id')->all(),$oferta->tipo_oferta_id,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre:') !!}
			{!! Form::text ('nombre',$oferta->nombre,['placeholder'=>'Ingresa nombre de empleo','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tiempo','Tiempo') !!}
			{!! Form::select ('tiempo',array('Medio tiempo'=>'Medio tiempo','Tiempo completo'=>'Tiempo completo','Mixto'=>'Mixto'),$oferta->tiempo,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('salario','Salario:') !!}
			{!! Form::text ('salario',$oferta->salario,['placeholder'=>'Ingresa salario','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('descripcion','Descripción:') !!}
			{!! Form::textarea ('descripcion',$oferta->descripcion,['placeholder'=>'Descripción','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
       				
                    <div class="form-group">
                      {!! Form::label ('entidad_id','Entidad:') !!}
			{!! Form::select ('entidad_id',$entidades->pluck('nombre','id')->all(),$oferta->entidad_id,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('municipio_id','Municipio:') !!}
			{!! Form::select ('municipio_id',$municipios->pluck('nombre','id')->all(),$oferta->municipio_id,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('colonia','Colonia:') !!}
			{!! Form::text ('colonia',$oferta->colonia,['placeholder'=>'Ingresa tu colonia','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('calle','Calle:') !!}
			{!! Form::text ('calle',$oferta->calle,['placeholder'=>'Ingresa tu calle','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('no_edificio','Número:') !!}
			{!! Form::number ('no_edificio',$oferta->no_edificio,['placeholder'=>'Ingresa número de edificio','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('cp','Código postal:') !!}
			{!! Form::text ('cp',$oferta->cp,['placeholder'=>'Ingresa código postal','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),$oferta->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar oferta',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('ofertas') !!}">Regresar</a>
                </div>
              </div>



              <div class="col-md-6 col-sm-12">
                <div class="block">
                  <form id="form2id">
                    
                    @foreach($prestaciones as $prestacion)
                    @continue($ban=0)
                    @foreach($prestaciones_ofertas as $prestaciones_oferta)
                    
                    @if($prestacion->id == $prestaciones_oferta->prestacion_id)
                    <input id="prestacion" type="checkbox" name="prestacion[]" checked="true" value="{{$prestacion->id}}">
                    <label>{{$prestacion->nombre}}:</label><br>
                    <label>{{$prestacion->descripcion}}</label><br>
                    @break($ban=true)
                    
                    @endif
                    @endforeach
                    @if($ban == 0)
                    <input id="prestacion" type="checkbox" name="prestacion[]" value="{{$prestacion->id}}">
                    <label>{{$prestacion->nombre}}:</label><br>
                    <label>{{$prestacion->descripcion}}</label><br>
                    @endif
                    @endforeach
                  </form>
                  <button class="botones" onclick="ejecutar2({{$oferta->id}})">Añadir</button>
                  <div  id = "mjs">


                  </div>
                  <br>
      <br>
      
      
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 