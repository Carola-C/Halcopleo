@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de habilidades-curriculums</h1>
                    <div>
  	<a class="botones" href="habilidades_curriculums/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="customers">
		<tr>
			<th>ID</th>
			<th>Curriculum ID</th>
			<th>Habilidad ID</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		@foreach($habilidades_curriculums as $habilidades_curriculum)
		<tr>
			<td>{!! $habilidades_curriculum->id !!}</td>
			<td>{!! $habilidades_curriculum->curriculums->id !!}</td>
			<td>{!! $habilidades_curriculum->habilidades->id !!}</td>
			
			<td>{!! $habilidades_curriculum->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'habilidades_curriculums/'.$habilidades_curriculum->id !!}">Detalle</a>
				<a class="botones" href="{!! 'habilidades_curriculums/'.$habilidades_curriculum->id.'/edit' !!}">Editar</a>
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/habilidades_curriculums/'.$habilidades_curriculum->id])!!}
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



