@extends('template.master')
<script>
  function llenar_municipios(entidad_id) {
    $("#municipio_id").empty();
    var asset = '{{ asset('
    ') }}'
    var ruta = asset + 'combo_municipios_x_entidad/' + entidad_id;
    $.ajax({
      type: 'GET',
      url: ruta,
      success: function(data) {
        var municipios = data;
        for (var i = 0; i < municipios.length; i++) {
          $('#municipio_id').append('<option value="' + municipios[i].id + '">' + municipios[i].nombre + '</option>');
        }
      },
      error: function(error) {
        console.log(error);
        alert(JSON.stringify(error));
        $('#mjs').html("ERROR");
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
          <h1>Registro</h1>
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
    <!--
            @if($errors)
            <div class="alert alert-warning" role="alert">
               @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            </div>
            @endif </br>
          -->
    <div >
      <div class="row">
        <div class="column">
          {!! Form::open(['url'=>'/register','enctype'=>'multipart/form-data']) !!}
          <div class="form-group">
            {!! Form::label ('nombre','Nombre:') !!}
            {!! Form::text ('nombre',null,['placeholder'=>'Ingresa tu nombre','class'=>'form-control', 'required'=>'required']) !!}
          </div>

          <div class="form-group">
            {!! Form::label ('ap_pat','Apellito paterno:') !!}
            {!! Form::text ('ap_pat',null,['placeholder'=>'Ingresa tu apellido','class'=>'form-control', 'required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('ap_mat','Apellito materno:') !!}
            {!! Form::text ('ap_mat',null,['placeholder'=>'Ingresa tu apellido','class'=>'form-control', 'required'=>'required']) !!}

          </div>
          <div class="form-group">
            {!! Form::label ('sexo','Sexo') !!}
            {!! Form::select ('sexo',array('Femenino'=>'Femenino','Masculino'=>'Masculino'),null,['placeholder'=>'Seleccionar','class'=>'form-control','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('telefono','Teléfono:') !!}
            {!! Form::text ('telefono',null,['placeholder'=>'Ingresa tu número','class'=>'form-control','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('fecha_nac','Fecha de nacimiento:') !!}
            {!! Form::date ('fecha_nac',null,['placeholder'=>'Ingresa tu fecha de nacimiento','class'=>'form-control','required'=>'required', 'max'=>'2012-12-31']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('email','Correo:') !!}
            {!! Form::email ('email',null,['placeholder'=>'Ingresa tu correo','class'=>'form-control','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('password','Contraseña:') !!}
            {!! Form::text ('password',null,['placeholder'=>'Ingresa tu contraseña','class'=>'form-control','required'=>'required']) !!}
          </div>
        </div>

        <div class="column">
          <div class="form-group">
            {!! Form::label ('entidad_id','Entidad:') !!}
            {!! Form::select ('entidad_id',$entidades->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control','onchange'=>'llenar_municipios(this.value);','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('municipio_id','Municipio:') !!}
            {!! Form::select ('municipio_id', array(''=>'Seleccionar'),null,['class'=>'form-control','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('colonia','Colonia:') !!}
            {!! Form::text ('colonia',null,['placeholder'=>'Ingresa tu colonia','class'=>'form-control','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('calle','Calle:') !!}
            {!! Form::text ('calle',null,['placeholder'=>'Ingresa tu calle','class'=>'form-control','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('no_casa','Número de casa:') !!}
            {!! Form::number ('no_casa',null,['placeholder'=>'Ingresa tu número de casa','class'=>'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('cp','Código postal:') !!}
            {!! Form::text ('cp',null,['placeholder'=>'Ingresa código postal','class'=>'form-control','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('tipo_usuario_id','Tipo de usuario:') !!}
            {!! Form::select ('tipo_usuario_id',$tipos_usuarios->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control','required'=>'required']) !!}
          </div>
          <div class="form-group">
            {!! Form::hidden ('estatus',1,['placeholder'=>'Seleccionar','class'=>'form-control','type'=>'hidden']) !!}
          </div>
          <div class="form-group">
            {!! Form::label ('foto_ruta','Imagen:') !!}
            {!! Form::file ('foto_ruta',null,['placeholder'=>'Ingresa una imagen','class'=>'form-control','required'=>'required']) !!}
          </div>
        </div>
      </div>
      <div class="form-group">
        {!! Form::submit('Aceptar',['class'=>'botones']) !!}
      </div>
      {!! Form::close() !!}
      <br>
      <br>
    </div>
  </div>
</section>
@endsection()