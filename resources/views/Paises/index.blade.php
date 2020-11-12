@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de paises</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="paises/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Clave</th>
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($paises as $pais)
		<tr>
			<td>{!! $pais->id !!}</td>
			<td>{!! $pais->nombre !!}</td>
			<td>{!! $pais->clave !!}</td>
			<td>{!! $pais->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'paises/'.$pais->id !!}">Detalle</a>
				<a class="botones" href="{!! 'paises/'.$pais->id.'/edit' !!}">Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/paises/'.$pais->id])!!}
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




