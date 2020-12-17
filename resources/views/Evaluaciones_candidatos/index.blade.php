@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Evaluaciones de Candidatos</h1>
                    <div>
  	<a class="botones" href="evaluaciones_candidatos/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="customers">
		<tr>
			<th>ID</th>
			<th>Postulacion ID</th>
			<th>Calificación </th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr> 
		@foreach($evaluaciones_candidatos as $evaluacion_candidato)
		<tr>
			<td>{!! $evaluacion_candidato->id !!}</td>
			<td>{!! $evaluacion_candidato->postulacion_id !!}</td>
			<td>{!! $evaluacion_candidato->calificacion !!}</td>
			
			<td>{!! $evaluacion_candidato->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'evaluaciones_candidatos/'.$evaluacion_candidato->id !!}">Detalles</a>
				<a class="botones" href="{!! 'evaluaciones_candidatos/'.$evaluacion_candidato->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/evaluaciones_candidatos/'.$evaluacion_candidato->id])!!}
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


