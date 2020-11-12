@extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalle de empresa</h1>
					<h2 align="left">ID: {!! $empresa->id !!}</h2>
	<h2 align="left">Nombre: {!! $empresa->razon_social !!}</h2>
	<h2 align="left">RFC: {!! $empresa->rfc !!}</h2>
	<h2 align="left">Entidad: {!! $empresa->entidades->nombre !!}</h2>
	<h2 align="left">Municipio: {!! $empresa->municipios->nombre !!}</h2>
	<h2 align="left">Colonia: {!! $empresa->colonia !!}</h2>
	<h2 align="left">Calle: {!! $empresa->calle !!}</h2>
	<h2 align="left">N°: {!! $empresa->no_edificio !!}</h2>
	<h2 align="left">Código postal: {!! $empresa->cp !!}</h2>
	<h2 align="left">Estatus: {!! $empresa->estatus !!}</h2>
	<br>
	<a class="botones" href="{!! asset('empresas') !!}">Regresar</a>
					
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

