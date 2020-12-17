@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Prestaciones</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="prestaciones/create">Crear</a>
  	
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
		@foreach($prestaciones as $prestacion)
		<tr>
			<td>{!! $prestacion->id !!}</td>
			<td>{!! $prestacion->nombre !!}</td>
			<td>{!! $prestacion->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'prestaciones/'.$prestacion->id !!}">Detalles</a>
				<a class="botones" href="{!! 'prestaciones/'.$prestacion->id.'/edit' !!}">Editar</a><br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/prestaciones/'.$prestacion->id])!!}
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



