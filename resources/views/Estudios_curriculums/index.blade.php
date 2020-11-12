@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de estudios-curriculums</h1>
                    <div>
  	<a class="botones" href="estudios_curriculums/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="customers">
		<tr>
			<th>ID</th> 
			<th>Curriculum ID</th>
			<th>Estudios ID</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		@foreach($estudios_curriculums as $estudio_curriculum)
		<tr>
			<td>{!! $estudio_curriculum->id !!}</td>
			<td>{!! $estudio_curriculum->curriculums->id !!}</td>
			<td>{!! $estudio_curriculum->estudios->id !!}</td>
			
			<td>{!! $estudio_curriculum->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'estudios_curriculums/'.$estudio_curriculum->id !!}">Detalle</a>
				<a class="botones" href="{!! 'estudios_curriculums/'.$estudio_curriculum->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/estudios_curriculums/'.$estudio_curriculum->id])!!}
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


