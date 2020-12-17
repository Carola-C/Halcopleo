@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Usuarios</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="users/create">Crear</a> 
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>ID</th>
			<th>ID tipo</th>
			<th>Tipo usuario</th>
			<th>Nombre</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($users as $user)
		<tr>
			<td>{!! $user->id !!}</td>
			<td>{!! $user->tipo_usuario_id !!}</td>
			<td>{!! $user->tipos_usuarios->nombre !!}</td>
			<td>{!! $user->nombre !!} {!! $user->ap_pat !!} {!! $user->ap_mat !!}</td>
			
			<td>{!! $user->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'users/'.$user->id !!}">Detalles</a>
				<!--<a class="botones" href="{!! 'users/'.$user->id.'/edit' !!}">Editar</a>-->
				<br>
				<br> 
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/users/'.$user->id])!!}
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





