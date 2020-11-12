 @extends('template.master')  

  @section('contenido_central') 
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">

            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Oferta</h1>
                  @if($banO==null)
                  <h2 align="left">La oferta ha sido eliminada pero aún puedes ver tu retroalimentación</h2>
                  @else
					<h2 align="left">Número de postulación: {!! $postulacion->id !!}</h2>
	<h2 align="left">Candidato: {!! $postulacion->users->nombre !!} {!! $postulacion->users->ap_pat !!} {!! $postulacion->users->ap_mat !!} </h2>
	
	<h2 align="left">Empresa: {!! $postulacion->ofertas->empresas->razon_social !!}</h2>
  	<h2 align="left">Tipo de oferta: {!! $postulacion->ofertas->tipos_ofertas->nombre !!}</h2>
  	<h2 align="left">Oferta: {!! $postulacion->ofertas->nombre !!}</h2>
  	<h2 align="left">Tiempo: {!! $postulacion->ofertas->tiempo !!}</h2>
  	<h2 align="left">Salario: $ {!! $postulacion->ofertas->salario !!}</h2>
  	<h2 align="left">Descripción: {!! $postulacion->ofertas->descripcion !!}</h2>
  	<h2 align="left">Dirección: {!! $postulacion->ofertas->calle !!}, {!! $postulacion->ofertas->no_edificio !!}, {!! $postulacion->ofertas->colonia !!}, C.P. {!! $postulacion->ofertas->cp !!}, {!! $postulacion->ofertas->municipios->nombre !!}, {!! $postulacion->ofertas->entidades->nombre !!}</h2>
  	@endif;

	<br>
	<a class="botones" href="{!! asset('postulaciones') !!}">Regresar</a> 
					
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
  <section id="contact-form">
          <div class="container">
            <div class="row">
                <div class="block">
                  <div class="caja"> Evaluación</div>
                  <div class="eti">
                  	
                  	@if($ban == 0)
                  	<h1 align="center">Aún no se realizá una evaluación</h1>
                  	@else
                  	@foreach($evaluacion as $eval)
                  	<label>Calificación: </label>{!!$eval->calificacion!!}<br>
                  	<label>Comentarios: </label>{!!$eval->comentario!!}<br>
                  	@endforeach
                  	@endif
                    
                    
                  </div>
                  
                </div>
              
              
              
            </div>

          </div>
        </section>
@endsection()

