@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Estudios</h1>
                    <div>
  	<a class="botones" href="estudios/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="customers">
		<tr>
			<th>Id</th>
			<th>Escuela</th>
			<th>Título</th>
			<th>Pais</th>
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		@foreach($estudios as $estudio)
		<tr>
			<td>{!! $estudio->id !!}</td>
			<td>{!! $estudio->nombre_escuela !!}</td> 
			<td>{!! $estudio->titulo !!}</td> 
			<td>{!! $estudio->paises->nombre !!}</td>
			<td>{!! $estudio->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'estudios/'.$estudio->id !!}">Detalles</a>
				<br>
				<br>
				<a class="botones" href="{!! 'estudios/'.$estudio->id.'/edit' !!}">Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/estudios/'.$estudio->id])!!}
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


