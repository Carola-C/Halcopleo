@extends('template.master')    


  @section('contenido_central')
   <!-- Slider Start -->
   <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Mira tus postulaciones</h1>
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
                	<h1 id="mjs">Mis postulaciones</h1>
                    <div>
  	<a class="botones" href="{!! asset('vist_ofer') !!}">Regresar</a>
  	
  </div>
  <div>
  	<br>
  	<br><!--
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>ID</th>
			<th>Candidato ID</th>
			<th>Oferta ID</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr> 
		</thead>
      <tbody>
		@foreach($postulaciones as $postulacion)
		<tr>
			<td>{!! $postulacion->id !!}</td>
			<td>{!! $postulacion->users->nombre !!} {!! $postulacion->users->ap_pat !!} {!! $postulacion->users->ap_mat !!}</td>
			<td>{!! $postulacion->ofertas->nombre !!}</td>
			@if($postulacion->estatus == 1)
			<td>Postulando</td>
			@endif
			@if($postulacion->estatus == 0)
			<td>Sin postular</td>
			@endif
			@if($postulacion->estatus == 2)
			<td>Empleador elimino la postulación pero aún puedes ver la información</td>
			@endif
			
			<td>
				<a class="botones" href="{!! 'show_p/'.$postulacion->id !!}">Detalle</a>
				
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/postulaciones/'.$postulacion->id])!!}
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
	 				@foreach($postulaciones as $postulacion)
					 	<div class="col-sm-6 col-md-3">
						 <a href="{!! 'show_p/'.$postulacion->id !!}">
		 					 <img src="{{ asset('../storage/empresas') }}/{!! $postulacion->ofertas->empresas->foto_ruta !!}" width="200px">
							  <p align="center" class="animated fadeIn">{!! $postulacion->ofertas->empresas->razon_social !!}</p>
							  <p align="center" class="animated fadeIn">{!! $postulacion->ofertas->nombre !!}</p>
							  @if($postulacion->estatus == 1)
								<p align="center" class="animated fadeIn">Postulando</p>
							  @endif
							  @if($postulacion->estatus == 0)
								<p align="center" class="animated fadeIn">Sin postular</p>
							  @endif
							  @if($postulacion->estatus == 2)
								<p align="center" class="animated fadeIn">Empleador elimino la postulación pero aún puedes ver la información</p>
							  @endif
							  
								{!! Form ::open(['method'=>'DELETE' , 'url' =>'/postulaciones/'.$postulacion->id])!!}
								{!! Form::submit('Eliminar',['class'=>'botones']) !!}
								{!! Form::close() !!}
						 </a>
		  				</div>
		 			@endforeach
              </div>
              
            </div>

          </div>
		  	
        </section>

  
	
@endsection()



