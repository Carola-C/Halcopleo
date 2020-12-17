  @extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalles de Curriculum</h1>
					<h2 align="left">ID: {!! $curriculum->id !!}</h2>
	<h2 align="left">Nombre: {!! $curriculum->users->nombre !!}</h2>
	<h2 align="left">Tipo usuario: {!! $curriculum->foto_ruta !!}</h2>
	<h2 align="left">Tipo usuario: {!! $curriculum->grados_max_estudios->nombre !!}</h2>
	
	<h2 align="left">Nombre: {!! $curriculum->nombre_escuela !!}</h2>
	<h2 align="left">Nombre: {!! $curriculum->descripcion_candidato !!}</h2>
	<h2 align="left">Estatus: {!! $curriculum->estatus !!}</h2>
	<br>
	<a class="botones" href="{!! asset('curriculums') !!}">Regresar</a>
					
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

