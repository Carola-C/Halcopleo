@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Ofertas</h1>
                    <div>
  	<!--<a class="botones" href="ofertas/create">Crear</a>-->
  	<a class="botones" href="{!! asset('vist_ofer') !!}">Regresar</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			
			<th>Empresa</th>
			<th>Tipo oferta</th>
			<th>Nombre</th>
			<th>Salario</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($ofertas as $oferta)
		<tr>
			
			<td>{!! $oferta->empresas->razon_social !!}</td>
			<td>{!! $oferta->tipos_ofertas->nombre !!}</td>
			<td>{!! $oferta->nombre !!}</td>
			<td>{!! $oferta->salario !!}</td>
			@if($oferta->estatus == 1)
			<td>Aceptado</td>
			@endif
			@if($oferta->estatus == 2)
			<td>Pendiente</td>
			@endif
			@if($oferta->estatus == 3)
			<td>No aceptado</td>
			@endif
			
			<td>
				<a class="botones" href="{!! 'ofertas/'.$oferta->id !!}">Detalles</a>
				<a class="botones" href="{!! 'ofertas/'.$oferta->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/ofertas/'.$oferta->id])!!}
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

