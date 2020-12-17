	 @extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12"> 
                <div class="block">
                  <h1>Detalles de Experiencia-Curriculum</h1>
					<h2 align="left">Lugar: {!! $experiencia_curriculum->experiencias->nombre_lugar !!}, {!! $experiencia_curriculum->experiencias->ciudad !!}, {!! $experiencia_curriculum->experiencias->paises->nombre !!}</h2>
	<h2 align="left">Tiempo: {!! $experiencia_curriculum->experiencias->tiempo_inicio !!} - {!! $experiencia_curriculum->experiencias->tiempo_fin !!} </h2>
	<h2 align="left">Cargo: {!! $experiencia_curriculum->experiencias->cargo !!}</h2>
	<h2 align="left">Descripión: {!! $experiencia_curriculum->experiencias->descripcion !!}</h2>
	<br>
	<a class="botones" href="{!! asset('curriculum/'.$experiencia_curriculum->curriculums->id) !!}">Regresar</a> 
					 
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

