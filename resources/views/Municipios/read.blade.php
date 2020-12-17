 @extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalles de municipio</h1>
					<h2 align="left">ID entidad: {!! $municipio->entidad_id !!}</h2>
					<h2 align="left">Nombre de la entidad: {!! $municipio->entidades->nombre !!}</h2>
					<h2 align="left">Nombre: {!! $municipio->nombre !!}</h2>
					<h2 align="left">Estatus: {!! $municipio->estatus !!}</h2>
					<br>
					<a class="botones" href="{!! asset('municipios') !!}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()



