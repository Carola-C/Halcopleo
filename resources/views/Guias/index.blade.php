@extends('template.master')    


  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de guías</h1>
                    <div>
                      <a class="botones" href="vist_guias">Regresar</a>
  	<a class="botones" href="guias/create">Crear</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			
			<th>Tipo de guía</th>
			<th>Nombre</th>
			<th>Estatus</th>
			<th>Acciones</th>
		</tr>
    </thead>
      <tbody>
		@foreach($guias as $guia)
		<tr>
			
			<td>{!! $guia->tipos_guias->nombre !!}</td>
			<td>{!! $guia->nombre !!}</td>
			@if($guia->estatus == 1)
      <td>Aceptado</td>
      @endif
      @if($guia->estatus == 2)
      <td>Pendiente</td>
      @endif
      @if($guia->estatus == 3)
      <td>No aceptado</td>
      @endif
			<td>
				<a class="botones" href="{!! 'guias/'.$guia->id !!}">Detalle</a>
				<a class="botones" href="{!! 'guias/'.$guia->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/guias/'.$guia->id])!!}
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



