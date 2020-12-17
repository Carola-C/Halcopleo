@extends('template.master')    

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Empresas-Empleadores</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<!--<a class="botones" href="empresas_empleadores/create">Crear</a>-->
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>ID</th> 
			<th>Empresa ID</th>
			<th>Empleador ID</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($empresas_empleadores as $empresa_empleador)
		<tr>
			<td>{!! $empresa_empleador->id !!}</td>
			<td>{!! $empresa_empleador->empresa_id !!}</td>
			<td>{!! $empresa_empleador->empleador_id !!}</td>
			
			<td>{!! $empresa_empleador->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'empresas_empleadores/'.$empresa_empleador->id !!}">Detalles</a>
				<!--<a class="botones" href="{!! 'empresas_empleadores/'.$empresa_empleador->id.'/edit' !!}">Editar</a>-->
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/empresas_empleadores/'.$empresa_empleador->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
			</td>
		</tr>
		@endforeach	
		</tbody>
	</table>
  </div>
 
			
     </div>
<script type="text/javascript">
	$('#tabla').DataTable();
</script>
              </div>
              
            </div>

          </div>
        </section>

  
	
@endsection()
