 @extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalles de Favorito</h1>
                  <h2 align="left">ID: {!! $guia_favorita->id !!} </h2>
					<h2 align="left">Nombre: {!! $guia_favorita->users->nombre !!} {!! $guia_favorita->users->ap_pat !!} {!! $guia_favorita->users->ap_mat !!} </h2>
					<h2 align="left">Nombre: {!! $guia_favorita->guias->nombre !!} </h2>
					
					<h2 align="left">Descripción: {!! $guia_favorita->guias->descripcion !!} </h2>
					
					<h2 align="left">Estatus: {!! $guia_favorita->estatus !!}</h2>
					<br>
					<a class="botones" href="{!! asset('guias_favoritas') !!}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection()
