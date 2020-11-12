	 @extends('template.master')  
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12"> 
                <div class="block">
                  <h1>Detalle de conocimiento-curriculum</h1>
					<h2 align="left">ID: {!! $conocimiento_curriculum->id !!}</h2>
	<h2 align="left">ID candidato: {!! $conocimiento_curriculum->curriculums->candidato_id !!} </h2>
	
	<h2 align="left">Conocimiento: {!! $conocimiento_curriculum->conocimientos->nombre !!}</h2>
	
	<h2 align="left">Estatus: {!! $conocimiento_curriculum->estatus !!}</h2>
	<br>
	<a class="botones" href="{!! asset('conocimientos_curriculums') !!}">Regresar</a> 
					  
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

