 @extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalle de guía</h1>
                  
					<h2 align="left">Creado por: {!! $guia->users->nombre !!} {!! $guia->users->ap_pat !!} {!! $guia->users->ap_mat !!} </h2>
					<h2 align="left">Tipo de guía: {!! $guia->tipos_guias->nombre !!} </h2>
					<h2 align="left">Nombre de guía: {!! $guia->nombre !!} </h2>
					<h2 align="left">Descripción: {!! $guia->descripcion !!} </h2>
					
					
					<br>
					<a class="botones" href="{!! asset('vist_guias') !!}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()
