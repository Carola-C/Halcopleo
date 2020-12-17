@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Tipos de Ofertas</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<a class="botones" href="tipos_ofertas/create">Crear</a>
  	
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
		@foreach($tipos_ofertas as $tipo_empresa)
		<tr>
			<td>{!! $tipo_empresa->id !!}</td>
			<td>{!! $tipo_empresa->nombre !!}</td>
			<td>{!! $tipo_empresa->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'tipos_ofertas/'.$tipo_empresa->id !!}">Detalles</a>
				<a class="botones" href="{!! 'tipos_ofertas/'.$tipo_empresa->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/tipos_ofertas/'.$tipo_empresa->id])!!}
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



