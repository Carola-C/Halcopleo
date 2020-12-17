@extends('template.master')    


  @section('contenido_central')
  <!-- Slider Start -->
  <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Estas son las guías que has creado</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
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
    <!--
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
  -->
  </div>
 
<script type="text/javascript">
  $('#tabla').DataTable();
</script> 
     </div>
              </div>
              
            </div>
            @foreach($guias as $guia)
                <div class="col-sm-6 col-md-3" align="center">
                    @continue($ban= 0)
                    <a href="{!! 'guias/'.$guia->id !!}">
					@if($guia->tipo_guia_id == 1)
                    <img align="center" href="{!! 'guias/'.$guia->id !!}" src="{!! asset('estilo/img/curriculum.jpg') !!}" width="200px">
					@endif
					@if($guia->tipo_guia_id == 2)
                    <img align="center" href="{!! 'guias/'.$guia->id !!}" src="{!! asset('estilo/img/presentacion.png') !!}" width="200px">
					@endif
					@if($guia->tipo_guia_id == 3)
                    <img align="center" href="{!! 'guias/'.$guia->id !!}" src="{!! asset('estilo/img/entrevista.png') !!}" width="200px">
					@endif
          @if($guia->estatus == 1)
                    <p align="center" class="animated fadeIn">Estatus: Fue aceptada</p>
      @endif
      @if($guia->estatus == 2)
      <p align="center" class="animated fadeIn">Estatus: Esta pendiente</p>
      @endif
      @if($guia->estatus == 3)
      <p align="center" class="animated fadeIn">Estatus: No fue aceptada</p>
      @endif
                    <p align="center" class="animated fadeIn">{!! $guia->tipos_guias->nombre !!}</p>
                    <p align="center" class="animated fadeIn">{!! $guia->nombre !!}</p>
                    </a>
                    <a class="botones" href="{!! 'guias/'.$guia->id.'/edit' !!}">Editar</a>
				<br><br>
				{!! Form ::open(['method'=>'DELETE' , 'url' =>'/guias/'.$guia->id])!!}
					{!! Form::submit('Eliminar',['class'=>'botones']) !!}
					{!! Form::close() !!}
                    
                    
                    
                </div>
              @endforeach


          </div>
        </section>

  
	
@endsection()



