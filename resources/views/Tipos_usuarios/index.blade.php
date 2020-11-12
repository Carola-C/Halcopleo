@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de tipos de usuarios</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="tipos_usuarios/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($tipos_usuarios as $tipos_usuario)
		<tr>
			<td>{!! $tipos_usuario->id !!}</td>
			<td>{!! $tipos_usuario->nombre !!}</td>
			<td>{!! $tipos_usuario->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'tipos_usuarios/'.$tipos_usuario->id !!}">Detalle</a>
				<a class="botones" href="{!! 'tipos_usuarios/'.$tipos_usuario->id.'/edit' !!}">Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/tipos_usuarios/'.$tipos_usuario->id])!!}
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



