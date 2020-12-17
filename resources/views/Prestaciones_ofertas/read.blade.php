 @extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalles de Prestacion-Oferta</h1>
					<h2 align="left">ID: {!! $prestacion_oferta->id !!}</h2>
	<h2 align="left">Empresa: {!! $prestacion_oferta->ofertas->nombre !!} </h2>
	
	<h2 align="left">Habilidad: {!! $prestacion_oferta->prestaciones->nombre !!}</h2>
	
	<h2 align="left">Estatus: {!! $prestacion_oferta->estatus !!}</h2>
	<br>
	<a class="botones" href="{!! asset('prestaciones_ofertas') !!}">Regresar</a> 
					
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

