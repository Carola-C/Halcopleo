@extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalles de Habilidad-Curriculum</h1>
					<h2 align="left">ID: {!! $habilidad_curriculum->id !!}</h2>
	<h2 align="left">ID candidato: {!! $habilidad_curriculum->curriculums->candidato_id !!} </h2>
	
	<h2 align="left">Habilidad: {!! $habilidad_curriculum->habilidades->nombre !!}</h2>
	
	<h2 align="left">Estatus: {!! $habilidad_curriculum->estatus !!}</h2>
	<br>
	<a class="botones" href="{!! asset('habilidades_curriculums') !!}">Regresar</a> 
					
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

