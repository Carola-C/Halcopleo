@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Postulaciones</h1>
                    <div>
               <a class="botones" href="{!! asset('vist_ofer') !!}">Regresar</a>     	
  </div>
  <div class="container">
  	<br>
  	<br>
  	<table id="tabla" class="customers">
  		<thead>
		<tr>
			<th>ID</th>
			<th>Candidato</th>
			<th>Oferta</th>
			
			<th>Evaluación</th>
			<th>Acciones</th>
		</tr> 
		</thead>
		<tbody>
		@foreach($postulaciones as $postulacion)
		
		<tr>
			<td>{!! $postulacion->id !!}</td>
			<td>{!! $postulacion->users->nombre !!} {!! $postulacion->users->ap_pat !!} {!! $postulacion->users->ap_mat !!}</td>
			<td>{!! $postulacion->ofertas->nombre !!}</td>
			
			<td>
				<?php $ban=false;?>
				@foreach($evaluaciones as $evaluacion)
				@if($evaluacion->postulacion_id == $postulacion->id)
				Evaluado
				<?php $ban=true;?>
				@endif
				@endforeach
				@if($ban== 0)
        		Sin evaluar
        		@endif


        
			</td>
			<td>
				<a class="botones" href="{!! 'postulaciones/'.$postulacion->id !!}">Detalle</a>
				<!--<a class="botones" href="{!! 'postulaciones/'.$postulacion->id.'/edit' !!}">Editar</a>-->
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/postulaciones/'.$postulacion->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
			</td>
		</tr>
		@endforeach	
		</tbody>
	</table>
  </div>
 
<script>
  	$(document).ready(function() {
    $('#tabla').DataTable();
} );
  	
  </script>	
     </div>
              </div>
              
            </div>

          </div>
        </section>

  
	
@endsection()



