 @extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block"> 
                	
                  <h1>Detalles de Estudio</h1>
                  <h2 align="left">ID: {!! $estudio->id !!}</h2>
          <h2 align="left">Nombre escuela/empresa: {!! $estudio->nombre_escuela !!}</h2>
          <h2 align="left">Título: {!! $estudio->titulo !!}</h2>
          <h2 align="left">Fecha inicio: {!! $estudio->fecha_inicio !!}</h2>
          <h2 align="left">Fecha fin: {!! $estudio->fecha_fin !!}</h2>
  <h2 align="left">Pais: {!! $estudio->paises->nombre !!}</h2>
  <h2 align="left">Ciudad: {!! $estudio->ciudad !!}</h2>
  
  
  <h2 align="left">Estatus: {!! $estudio->estatus !!}</h2>

  <br>
  <a class="botones" href="{!! asset('estudios') !!}">Regresar</a>
                  
                </div>
                
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

