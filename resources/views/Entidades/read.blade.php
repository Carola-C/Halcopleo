@extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12"> 
                <div class="block">
                  <h1>Detalle de entidad</h1>
                  <h2 align="left">Clave: {!! $entidad->clave_pais !!}</h2>
	<h2 align="left">Nombre: {!! $entidad->nombre !!}</h2>
	<h2 align="left">Estatus: {!! $entidad->estatus !!}</h2>
					
	<br>
	<a class="botones" href="{!! asset('entidades') !!}">Regresar</a> 
					  
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()




