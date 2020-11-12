@extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Perfil</h1>
                  <?php $user_id=$user->id  ?>
					<a class="botones" href="{!! 'users/'.$user_id.'/edit' !!}">Editar</a>
          <br><br>
	<img align="center" src="{{ asset('../storage/usuarios') }}/{!! $user->foto_ruta !!}" width="200px">
	<h2 align="left">Nombre: {!! $user->nombre !!}</h2>
	<h2 align="left">Apellido paterno: {!! $user->ap_pat !!}</h2>
	<h2 align="left">Apellido materno: {!! $user->ap_mat !!}</h2>
	<h2 align="left">Estatus: {!! $user->estatus !!}</h2>
  <h2 align="left">Sexo: {!! $user->sexo !!}</h2>
  <h2 align="left">Teléfono: {!! $user->telefono !!}</h2>
  <h2 align="left">Fecha de nacimiento: {!! $user->fecha_nac !!}</h2>
  <h2 align="left">Correo: {!! $user->email !!}</h2>
  <h2 align="left">Entidad: {!! $user->entidades->nombre !!}</h2>
  <h2 align="left">Municipio: {!! $user->municipios->nombre !!}</h2>
  <h2 align="left">Colonia: {!! $user->colonia !!}</h2>
  <h2 align="left">Calle: {!! $user->calle !!}</h2>
  <h2 align="left">Código postal: {!! $user->cp !!}</h2>
  <h2 align="left">N° casa: {!! $user->no_casa !!}</h2>
	<br>
	
					
                </div>
              </div>

            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

