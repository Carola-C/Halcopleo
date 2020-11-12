 @extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalle de conocimiento</h1>
					<h2 align="left">Nombre: {!! $conocimiento->nombre !!}</h2>

					<h2 align="left">Estatus: {!! $conocimiento->estatus !!}</h2>
					<br>
					<a class="botones" href="{!! asset('conocimientos') !!}">Regresar</a> 
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()
