@extends('template.master')    
 

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Curriculums</h1>
                    <div>
                    	<a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
  	<!--<a class="botones" href="curriculums/create">Crear</a>-->
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>ID</th>
			<th>Nombre candidato</th>
			<th>Grado estudio</th>
			<th>Nombre escuela</th>
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($curriculums as $curriculum)
		<tr>
			<td>{!! $curriculum->id !!}</td>
			<td>{!! $curriculum->users->nombre !!} {!! $curriculum->users->ap_pat !!} {!! $curriculum->users->ap_mat !!}</td>
			<td>{!! $curriculum->grados_max_estudios->nombre !!}</td>
			<td>{!! $curriculum->nombre_escuela !!}</td>
			
			<td>{!! $curriculum->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'curriculums/'.$curriculum->id !!}">Detalles</a>
				<!--<br>
				<br>
				<a class="botones" href="{!! 'curriculums/'.$curriculum->id.'/edit' !!}">Editar</a>-->
				<br>
				<br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/curriculums/'.$curriculum->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
			</td>
		</tr>
		</tbody>
		@endforeach	
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






