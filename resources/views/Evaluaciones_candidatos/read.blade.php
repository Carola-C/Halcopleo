 @extends('template.master')  
  @section('contenido_central') 
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalle de evaluación</h1>
					<h2 align="left">ID: {!! $evaluacion_candidato->id !!}</h2>
	<h2 align="left">Empresa: {!! $evaluacion_candidato->postulaciones->id !!} </h2>
	<h2 align="left">Candidato: {!! $evaluacion_candidato->postulaciones->candidato_id !!} </h2>
	<h2 align="left">Calificación: {!! $evaluacion_candidato->calificacion !!}</h2>
	<h2 align="left">Calificación: {!! $evaluacion_candidato->comentario !!}</h2>
	<h2 align="left">Estatus: {!! $evaluacion_candidato->estatus !!}</h2>
	<br>
	<a class="botones" href="{!! asset('evaluaciones_candidatos') !!}">Regresar</a> 
					
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

