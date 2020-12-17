@extends('template.master')    
  
<script type="text/javascript">
	$('#tabla').DataTable();
</script>
  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Catálogo de Conocimientos-Curriculums</h1>
                    <div>
  	<a class="botones" href="conocimientos_curriculums/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>ID</th> 
			<th>Curriculum ID</th>
			<th>Conocimiento ID</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($conocimientos_curriculums as $conocimiento_curriculum)
		<tr>
			<td>{!! $conocimiento_curriculum->id !!}</td>
			<td>{!! $conocimiento_curriculum->curriculums->id !!}</td>
			<td>{!! $conocimiento_curriculum->conocimientos->id !!}</td>
			
			<td>{!! $conocimiento_curriculum->estatus !!}</td>
			<td>
				<a class="botones" href="{!! 'conocimientos_curriculums/'.$conocimiento_curriculum->id !!}">Detalles</a>
				
				<a class="botones" href="{!! 'conocimientos_curriculums/'.$conocimiento_curriculum->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/conocimientos_curriculums/'.$conocimiento_curriculum->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
			</td>
		</tr>
		@endforeach	
		</tbody>
	</table>
  </div>
 <script>
  
  $(document).ready(function(){
    
    $('#tabla').DataTable();
   
  });
</script>
			
     </div>
              </div>
              
            </div>

          </div>
        </section>

  
	
@endsection()



