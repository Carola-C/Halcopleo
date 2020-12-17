@extends('template.master')    


  @section('contenido_central')
  <!-- Slider Start -->
  <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Mira todas las guías que te han gustado</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                    <div>
                    	<a class="botones" href="vist_guias">Regresar</a>
  	<!--<a class="botones" href="guias_favoritas/create">Crear</a>-->
  	
  </div>
  <div>
  	<br>
  	<br>
	  <!--
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>Autor</th>
			<th>Tipo de guía</th>
			<th>Nombre</th>
			
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($guias_favoritas as $guia_favorita)
		<tr>
			<td>{!! $guia_favorita->users->nombre !!}</td>
			<td>{!! $guia_favorita->guias->tipos_guias->nombre !!}</td>
			<td>{!! $guia_favorita->guias->nombre !!}</td>
			
			<td>
				<a class="botones" href="{!! 'guias/'.$guia_favorita->guia_id !!}">Detalles</a>
				<!--<a class="botones" href="{!! 'guias_favoritas/'.$guia_favorita->id !!}">Detalle</a>-->
				<!--<a class="botones" href="{!! 'guias_favoritas/'.$guia_favorita->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/guias_favoritas/'.$guia_favorita->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
			</td>
		</tr>
		@endforeach	
		</tbody>
	</table>
	-->
  </div>
 
<script type="text/javascript">
  $('#tabla').DataTable();
</script>	
     </div>
              </div>
              
            </div>
			@foreach($guias_favoritas as $guia_favorita)
                <div class="col-sm-6 col-md-3" align="center">
                    @continue($ban= 0)
                    <a href="{!! 'guias/'.$guia_favorita->guia_id !!}">
					@if($guia_favorita->guias->tipo_guia_id == 1)
                    <img align="center" href="{!! 'guias/'.$guia_favorita->guia_id !!}" src="{!! asset('estilo/img/curriculum.jpg') !!}" width="200px">
					@endif
					@if($guia_favorita->guias->tipo_guia_id == 2)
                    <img align="center" href="{!! 'guias/'.$guia_favorita->guia_id !!}" src="{!! asset('estilo/img/presentacion.png') !!}" width="200px">
					@endif
					@if($guia_favorita->guias->tipo_guia_id == 3)
                    <img align="center" href="{!! 'guias/'.$guia_favorita->guia_id !!}" src="{!! asset('estilo/img/entrevista.png') !!}" width="200px">
					@endif
                    <p align="center" class="animated fadeIn">Creado por: {!! $guia_favorita->users->nombre !!} {!! $guia_favorita->users->ap_pat !!}</p>
                    <p align="center" class="animated fadeIn">{!! $guia_favorita->guias->tipos_guias->nombre !!}</p>
                    <p align="center" class="animated fadeIn">{!! $guia_favorita->guias->nombre !!}</p>
                    </a>
                    {!! Form ::open(['method'=>'DELETE' , 'url' =>'/guias_favoritas/'.$guia_favorita->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
                </div>
              @endforeach

          </div>
        </section>

  
	
@endsection()



