@extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12"> 
                <div class="block">
                  <h1>Detalles de Estudio-Curriculum</h1>
					
	<h2 align="left">Periodo: {!! $estudio_curriculum->estudios->fecha_inicio !!} - {!! $estudio_curriculum->estudios->fecha_fin !!}</h2>
	<h2 align="left">Escuela: {!! $estudio_curriculum->estudios->nombre_escuela !!}</h2>
	<h2 align="left">Estudio: {!! $estudio_curriculum->estudios->titulo !!}</h2>
	<h2 align="left">País: {!! $estudio_curriculum->estudios->paises->nombre !!}</h2>
  <h2 align="left">Ciudad: {!! $estudio_curriculum->estudios->ciudad !!}</h2>
	<br>
	<a class="botones" href="{!! asset('curriculum/'.$estudio_curriculum->curriculums->id) !!}">Regresar</a> 
					  
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

