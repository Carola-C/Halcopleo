@extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar usuario</h1>
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
                  {!! Form::open([ 'method' => 'PATCH' ,'url'=>'/users/'.$user->id,'enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                      {!! Form::label ('nombre','Nombre:') !!}
			{!! Form::text ('nombre',$user->nombre,['placeholder'=>'Ingresa tu nombre','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('sexo','Sexo') !!}
			{!! Form::select ('sexo',array('Femenino'=>'Femenino','Masculino'=>'Masculino'),$user->sexo,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('ap_pat','Apellito paterno:') !!}
			{!! Form::text ('ap_pat',$user->ap_pat,['placeholder'=>'Ingresa tu apellido','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('ap_mat','Apellito materno:') !!}
			{!! Form::text ('ap_mat',$user->ap_mat,['placeholder'=>'Ingresa tu apellido','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('telefono','Teléfono:') !!}
			{!! Form::text ('telefono',$user->telefono,['placeholder'=>'Ingresa tu apellido','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('fecha_nac','Fecha de  nacimiento:') !!}
			{!! Form::date ('fecha_nac',$user->fecha_nac,['placeholder'=>'Ingresa tu fecha de nacimiento','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('email','Correo:') !!}
			{!! Form::email ('email',$user->email,['placeholder'=>'Ingresa tu correo','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <!--
                    <div class="form-group"> 
                      {!! Form::label ('password','Contraseña:') !!}
			{!! Form::text ('password',$user->password,['placeholder'=>'Ingresa tu contraseña','class'=>'form-control']) !!}
                    </div>
                  -->
                    <div class="form-group">
                      {!! Form::label ('entidad_id','Entidad:') !!}
			{!! Form::select ('entidad_id',$entidades->pluck('nombre','id')->all(),$user->entidad_id,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('municipio_id','Municipio:') !!}
			{!! Form::select ('municipio_id',$municipios->pluck('nombre','id')->all(),$user->municipio_id,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('colonia','Colonia:') !!}
			{!! Form::text ('colonia',$user->colonia,['placeholder'=>'Ingresa tu colonia','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('calle','Calle:') !!}
			{!! Form::text ('calle',$user->calle,['placeholder'=>'Ingresa tu calle','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('no_casa','Número de casa:') !!}
			{!! Form::number ('no_casa',$user->no_casa,['placeholder'=>'Ingresa tu número de casa','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('foto_ruta','Imagen:') !!}
			{!! Form::File ('foto_ruta',null,['placeholder'=>'Ingresa una imagen','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('cp','Código postal:') !!}
			{!! Form::number ('cp',$user->cp,['placeholder'=>'Ingresa código postal','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      
			{!! Form::hidden ('tipo_usuario_id',$user->tipo_usuario_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      
			{!! Form::hidden ('estatus',$user->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar usuario',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
			
			
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection()

 