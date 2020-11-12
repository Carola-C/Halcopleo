 @extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block"> 
                	
                  <h1>Detalle de experiencia</h1>
                  
          <h2 align="left">Nombre negocio/empresa: {!! $experiencia->nombre_lugar !!}</h2>
          <h2 align="left">Periodo: {!! $experiencia->tiempo_inicio !!} - {!! $experiencia->tiempo_fin !!}</h2>
          
  <h2 align="left">Pais: {!! $experiencia->paises->nombre !!}</h2>
  <h2 align="left">Ciudad: {!! $experiencia->ciudad !!}</h2>
  <h2 align="left">Cargo: {!! $experiencia->cargo !!}</h2>
  <h2 align="left">Descripción: {!! $experiencia->descripcion !!}</h2>
  

  <br>
  <a class="botones" href="{!! asset('experiencias') !!}">Regresar</a>
                </div>
                
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()

