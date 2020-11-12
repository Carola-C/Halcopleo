@extends('template.master')   
<script>
	$('#tabla').DataTable();
	function prueba(guia){

		var id2= "guia"+guia;
		var iman=document.getElementById(id2).src;
		var favorito ="{!! asset('estilo/img/corazon2.png') !!}";

		if (iman === favorito) {
			var asset = '{{ asset('') }}'
	      var ruta = asset+'favorito_g/'+guia;
	      $.ajax({
	            type: 'GET',
	            url: ruta,
	            success:function(data){
	              var favo = data;
	              alert(favo);
	              
	              
	              document.getElementById(id2).src="{!! asset('estilo/img/corazon1.png') !!}";
	              
	            },
	              error:function(error){
	                console.log(error);
	                alert(JSON.stringify(error));
	                $('#mjs').html( "ERROR" );
	              }
	        })
			
		}else{
			
		  var asset = '{{ asset('') }}'
	      var ruta = asset+'favorito_g/'+guia;
	      $.ajax({
	            type: 'GET',
	            url: ruta,
	            success:function(data){
	              var favo = data;
	              alert(favo);
	              
	              
	              document.getElementById(id2).src="{!! asset('estilo/img/corazon2.png') !!}";
	              
	            },
	              error:function(error){
	                console.log(error);
	                alert(JSON.stringify(error));
	                $('#mjs').html( "ERROR" );
	              }
	        })

			
		}
		
		
		
	}
</script> 
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                	<h1>Listado de guías</h1>
                    <div>
  	<a class="botones" href="guias_favoritas">Favoritos</a>
  	<a class="botones" href="guias">Mis guías</a>
  	
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
			<!--<th>Estatus</th>-->
			<th>Acciones</th>
		</tr>
		</thead>
      <tbody>
		@foreach($guias as $guia)
		<tr>
			<td>{!! $guia->users->nombre !!}</td>
			<td>{!! $guia->tipos_guias->nombre !!}</td>
			<td>{!! $guia->nombre !!}</td>
			<!--<td>{!! $guia->estatus !!}</td>-->
			<td>
				<?php $ban=false;?>
            @foreach($favs as $fav)
            
          		@if($fav->guia_id == $guia->id)
          			<a id="btn{{$guia->id}}" value="0" onclick="prueba({{$guia->id}})">
              		<img id="guia{{$guia->id}}" style="cursor:pointer;" src="{!! asset('estilo/img/corazon2.png') !!}">
            		</a>
            	<?php $ban=true;?>
            
          		@endif
        	@endforeach
        
        	@if($ban== 0)
	        	<a id="btn{{$guia->id}}" value="0" onclick="prueba({{$guia->id}})">
              	<img id="guia{{$guia->id}}" style="cursor:pointer;" src="{!! asset('estilo/img/corazon1.png') !!}">
            	</a>
        	@endif
				<a class="botones" href="{!! 'guias/'.$guia->id !!}">Detalle</a>
				
				
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



