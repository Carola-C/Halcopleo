@extends('template.master')
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
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  {!! Form::open(['url'=>'/users']) !!}
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre:') !!}
			{!! Form::text ('nombre',null,['placeholder'=>'Ingresa tu nombre','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('sexo','Sexo') !!}
			{!! Form::select ('sexo',array('Femenino'=>'Femenino','Masculino'=>'Masculino'),null,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('ap_pat','Apellito paterno:') !!}
			{!! Form::text ('ap_pat',null,['placeholder'=>'Ingresa tu apellido','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('ap_mat','Apellito materno:') !!}
			{!! Form::text ('ap_mat',null,['placeholder'=>'Ingresa tu apellido','class'=>'form-control']) !!}
			
                    </div>
                    <div class="form-group">
			{!! Form::label ('telefono','Teléfono:') !!}
			{!! Form::text ('telefono',null,['placeholder'=>'Ingresa tu número','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('fecha_nac','Fecha de  nacimiento:') !!}
			{!! Form::date ('fecha_nac',null,['placeholder'=>'Ingresa tu fecha de nacimiento','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('username','Correo:') !!}
			{!! Form::email ('username',null,['placeholder'=>'Ingresa tu correo','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('password','Contraseña:') !!}
			{!! Form::text ('password',null,['placeholder'=>'Ingresa tu contraseña','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('entidad_id','Entidad:') !!}
			{!! Form::select ('entidad_id',$entidades->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('municipio_id','Municipio:') !!}
			{!! Form::select ('municipio_id',$municipios->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('colonia','Colonia:') !!}
			{!! Form::text ('colonia',null,['placeholder'=>'Ingresa tu colonia','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('calle','Calle:') !!}
			{!! Form::text ('calle',null,['placeholder'=>'Ingresa tu calle','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('no_casa','Número de casa:') !!}
			{!! Form::number ('no_casa',null,['placeholder'=>'Ingresa tu número de casa','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('foto_ruta','Imagen:') !!}
			{!! Form::file ('foto_ruta',null,['placeholder'=>'Ingresa una imagen','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('cp','Código postal:') !!}
			{!! Form::number ('cp',null,['placeholder'=>'Ingresa código postal','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('tipo_usuario_id','Tipo de usuario:') !!}
			{!! Form::select ('tipo_usuario_id',$tipos_usuarios->pluck('nombre','id')->all(),null,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),null,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar Usuario',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('users') !!}">Regresar a paises</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 