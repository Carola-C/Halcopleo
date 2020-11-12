@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de habilidades</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="habilidades/create">Crear</a>
  	
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
		@foreach($habilidades as $habilidad)
		<tr>
			<td>{!! $habilidad->id !!}</td>
			<td>{!! $habilidad->nombre !!}</td>
			
			<td>{!! $habilidad->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'habilidades/'.$habilidad->id !!}">Detalle</a>
				<a class="botones" href="{!! 'habilidades/'.$habilidad->id.'/edit' !!}">Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/habilidades/'.$habilidad->id])!!}
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




	

