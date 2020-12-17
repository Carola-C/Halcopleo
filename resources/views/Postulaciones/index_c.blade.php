@extends('template.master')    


  @section('contenido_central')
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
  	<br>
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
				<a class="botones" href="{!! 'show_p/'.$postulacion->id !!}">Detalles</a>
				<!--<a class="botones" href="{!! 'postulaciones/'.$postulacion->id.'/edit' !!}">Editar</a>-->
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/postulaciones/'.$postulacion->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
			</td>
		</tr>
		@endforeach	
		</tbody>
	</table>
  </div>
 <script type="text/javascript">
  $('#tabla').DataTable();
</script>
			
     </div>
              </div>
              
            </div>

          </div>
        </section>

  
	
@endsection()



