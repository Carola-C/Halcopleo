@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de Entidades</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="entidades/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>Id</th>
			<th>Clave del pais</th>
			<th>Nombre</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($entidades as $entidad)
		<tr>
			<td>{!! $entidad->id !!}</td>
			
			<td>{!! $entidad->clave_pais !!}</td>
			<td>{!! $entidad->nombre !!}</td>
			<td>{!! $entidad->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'entidades/'.$entidad->id !!}">Detalle</a>
				<a class="botones" href="{!! 'entidades/'.$entidad->id.'/edit' !!}">Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/entidades/'.$entidad->id])!!}
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







