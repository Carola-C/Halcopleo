@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Experiencias</h1>
                    <div>
  	<a class="botones" href="experiencias/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="customers">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Cargo</th>
			<th>Pais</th>
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		@foreach($experiencias as $experiencia)
		<tr>
			<td>{!! $experiencia->id !!}</td>
			<td>{!! $experiencia->nombre_lugar !!}</td> 
			<td>{!! $experiencia->cargo !!}</td> 
			<td>{!! $experiencia->paises->nombre !!}</td>
			<td>{!! $experiencia->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'experiencias/'.$experiencia->id !!}">Detalles</a>
				<a class="botones" href="{!! 'experiencias/'.$experiencia->id.'/edit' !!}">
				Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/experiencias/'.$experiencia->id])!!}
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




