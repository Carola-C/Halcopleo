@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Empresas</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
                    	
  	<a class="botones" href="empresas/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr> 
			<th>ID</th>
			<th>Nombre</th>
			<th>RFC</th>
			
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($empresas as $empresa)
		<tr>
			<td>{!! $empresa->id !!}</td>
			<td>{!! $empresa->razon_social !!}</td>
			<td>{!! $empresa->rfc !!}</td>
			
			<td>
				<a class="botones" href="{!! 'empresas/'.$empresa->id !!}">Detalles</a>
				
				<a class="botones" href="{!! 'empresas/'.$empresa->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/empresas/'.$empresa->id])!!}
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



