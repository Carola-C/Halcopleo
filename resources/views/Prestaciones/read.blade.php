@extends('template.master')
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalles de Prestación</h1>
					<h2 align="left">Nombre: {!! $prestacion->nombre !!}</h2>
					<h2 align="left">Nombre: {!! $prestacion->descripcion !!}</h2>
					
					<h2 align="left">Estatus: {!! $prestacion->estatus !!}</h2>
					<br>
					<a class="botones" href="{!! asset('prestaciones') !!}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()
