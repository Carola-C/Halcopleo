@extends('template.master')    

 
  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de grados de estudios</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="grados_max_estudios/create">Crear</a>
  	
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
		@foreach($grados_max_estudios as $grados_max_estudio)
		<tr>
			<td>{!! $grados_max_estudio->id !!}</td>
			<td>{!! $grados_max_estudio->nombre !!}</td>
			
			<td>{!! $grados_max_estudio->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'grados_max_estudios/'.$grados_max_estudio->id !!}">Detalle</a>
				<a class="botones" href="{!! 'grados_max_estudios/'.$grados_max_estudio->id.'/edit' !!}">Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/grados_max_estudios/'.$grados_max_estudio->id])!!}
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



