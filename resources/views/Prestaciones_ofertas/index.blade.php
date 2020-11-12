@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de prestaciones-ofertas</h1>
                    <div>
  	<a class="botones" href="prestaciones_ofertas/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="customers">
		<tr>
			<th>ID</th>
			<th>Prestación ID</th>
			<th>Oferta ID</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		@foreach($prestaciones_ofertas as $prestacion_oferta)
		<tr>
			<td>{!! $prestacion_oferta->id !!}</td>
			<td>{!! $prestacion_oferta->prestacion_id !!}</td>
			<td>{!! $prestacion_oferta->oferta_id !!}</td>
			
			<td>{!! $prestacion_oferta->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'prestaciones_ofertas/'.$prestacion_oferta->id !!}">Detalle</a>
				<a class="botones" href="{!! 'prestaciones_ofertas/'.$prestacion_oferta->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/prestaciones_ofertas/'.$prestacion_oferta->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
			</td>
		</tr>
		@endforeach	
	</table>
  </div>
 
			
     </div>
              </div>
              
            </div>

          </div>
        </section>

  
	
@endsection()

