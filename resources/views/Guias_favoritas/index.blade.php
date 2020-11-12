@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de guías favoritas</h1>
                    <div>
                    	<a class="botones" href="vist_guias">Regresar</a>
  	<!--<a class="botones" href="guias_favoritas/create">Crear</a>-->
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>Autor</th>
			<th>Tipo de guía</th>
			<th>Nombre</th>
			
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($guias_favoritas as $guia_favorita)
		<tr>
			<td>{!! $guia_favorita->users->nombre !!}</td>
			<td>{!! $guia_favorita->guias->tipos_guias->nombre !!}</td>
			<td>{!! $guia_favorita->guias->nombre !!}</td>
			
			<td>
				<a class="botones" href="{!! 'guias/'.$guia_favorita->guia_id !!}">Detalle</a>
				<!--<a class="botones" href="{!! 'guias_favoritas/'.$guia_favorita->id !!}">Detalle</a>-->
				<!--<a class="botones" href="{!! 'guias_favoritas/'.$guia_favorita->id.'/edit' !!}">Editar</a>-->
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/guias_favoritas/'.$guia_favorita->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
			</td>
		</tr>
		@endforeach	
		</tbody>
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



