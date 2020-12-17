 @extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalles de Tipo de Guía</h1>
                  <h2 align="left">ID: {!! $tipo_guia->id !!}</h2>
					<h2 align="left">Nombre: {!! $tipo_guia->nombre !!}</h2>

					
					<h2 align="left">Estatus: {!! $tipo_guia->estatus !!}</h2>
					<br>
					<a class="botones" href="{!! asset('tipos_guias') !!}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()
