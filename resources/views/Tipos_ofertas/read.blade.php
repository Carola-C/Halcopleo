 @extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalle de tipo de oferta</h1>
					<h2 align="left">Nombre: {!! $tipo_oferta->nombre !!}</h2>

					
					<h2 align="left">Estatus: {!! $tipo_oferta->estatus !!}</h2>
					<br>
					<a class="botones" href="{!! asset('tipos_ofertas') !!}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()
