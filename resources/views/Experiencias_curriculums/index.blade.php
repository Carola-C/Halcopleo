@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Experiencias-Curriculums</h1>
                    <div>
  	<a class="botones" href="experiencias_curriculums/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="customers">
		<tr>
			<th>ID</th> 
			<th>Curriculum ID</th>
			<th>Experiencia ID</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		@foreach($experiencias_curriculums as $experiencia_curriculum)
		<tr>
			<td>{!! $experiencia_curriculum->id !!}</td>
			<td>{!! $experiencia_curriculum->curriculums->id !!}</td>
			<td>{!! $experiencia_curriculum->experiencias->id !!}</td>
			
			<td>{!! $experiencia_curriculum->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'experiencias_curriculums/'.$experiencia_curriculum->id !!}">Detalles</a>
				<a class="botones" href="{!! 'experiencias_curriculums/'.$experiencia_curriculum->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/experiencias_curriculums/'.$experiencia_curriculum->id])!!}
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






