 @extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalle de grado de estudios</h1>
					<h2 align="left">Nombre: {!! $grados_max_estudio->nombre !!}</h2>

					<h2 align="left">Estatus: {!! $grados_max_estudio->estatus !!}</h2>
					<br>
					<a class="botones" href="{!! asset('grados_max_estudios') !!}">Regresar</a> 
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()
