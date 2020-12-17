@extends('template.master')    

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Municipios</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="municipios/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>Id</th>
			<th>ID entidad</th>
			<th>Entidad</th>
			<th>Nombre</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($municipios as $municipio)
		<tr>
			<td>{!! $municipio->id !!}</td>
			<td>{!! $municipio->entidad_id !!}</td>
			<td>{!! $municipio->entidades->nombre !!}</td>
			<td>{!! $municipio->nombre !!}</td>
			<td>{!! $municipio->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'municipios/'.$municipio->id !!}">Detalles</a>
				<br>
				<br>
				<a class="botones" href="{!! 'municipios/'.$municipio->id.'/edit' !!}">Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/municipios/'.$municipio->id])!!}
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






