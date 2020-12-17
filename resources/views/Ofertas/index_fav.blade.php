@extends('template.master')    

  <script>
  	function postular(id){
      var asset = '{{ asset('') }}'
    var ruta = asset+'postular/'+id;
    //var id2= "post"+id;
    //var btn2 =$("#btn2").val();
    //alert(btn2);
      //$("#btn2").attr("value","0");
      //$("#btn2 span").text("Ver menos");
    //var a=document.getElementById(id2).value;
    //alert(id2);
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var dat=data;
              alert(dat);
              location.reload();
            },
   
  </script>

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1 id="mjs">Mis favoritos</h1>
                    <div>
  	<a class="botones" href="{!! asset('vist_ofer') !!}">Regresar</a>
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table id="tabla" class="customers">
      <thead>
		<tr>
			<th>ID</th>
			<th>Candidato ID</th>
			<th>Oferta ID</th>
			
			<th>Estatus</th>
			<th>Acciones</th>
		</tr> 
    </thead>
      <tbody>
		@foreach($postulaciones as $postulacion)
		<tr>
			<td>{!! $postulacion->id !!}</td>
			<td>{!! $postulacion->users->nombre !!} {!! $postulacion->users->ap_pat !!} {!! $postulacion->users->ap_mat !!}</td>
			<td>{!! $postulacion->ofertas->nombre !!}</td>
			@if($postulacion->estatus == 1)
			<td>Postulando</td>
			@endif
			@if($postulacion->estatus == 0)
			<td>Sin postular</td>
			@endif
			@if($postulacion->estatus == 2)
			<td>Empleador elimino la postulación pero aún puedes ver la información</td>
			@endif
			
			<td>
				<a class="botones" href="{!! 'show1/'.$postulacion->oferta_id !!}">Detalles</a>
				<!--<a class="botones" href="{!! 'postulaciones/'.$postulacion->id.'/edit' !!}">Editar</a>-->
				<br><br>
				 
            
            @if($postulacion->estatus == 1)
            <a class="botones" value="0" onclick="postular({{$postulacion->oferta_id}})">Dejar de postular</a>
            
            
            @endif
            
            @if($postulacion->estatus == 0)
            <a class="botones" onclick="postular({{$postulacion->oferta_id}})">Postular</a>
            
            @endif
            
                <br><br>
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



