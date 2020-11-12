@extends('template.master')    
  <script >
    $('#tabla').DataTable();
    
    $(document).ready(function() {
    $('#tabla').DataTable();
    //$('#customers').DataTable();
} );
  	function ver(id){
  		var asset = '{{ asset('') }}'
    	var ruta = asset+'mostrar_g/'+id;
    	
    	$.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var oferta = data;
              alert(oferta);

            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
    })
  	}
    function cambiar(tipo,id){
      var fil=id;
      var asset = '{{ asset('') }}'
      var ruta = asset+'cambiar_g/'+tipo+'/'+id;
      if (confirm("¿Seguro de realizar la siguiente acción?")) {
        
        $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){

              var guia = data;
              
              location.reload();
              
            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
        })
      };
    }
  </script>

  @section('contenido_central')
    <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Guías</h1>
                </div>
              </div>
            </div>
          </div>
        </section>

  
  
	
@endsection()
@section('contenido_central2')
<section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <a class="botones" href="{!! asset('vist_guias') !!}">Regresar</a>
    <br>
    <br>
                <div class="block" id="recarga">
                  <h1>Listado de guías</h1>
  <div class="container">
    <br>
    <br>
    <table id="tabla" class="customers">
      <thead>
        <tr>
          <th>Creado por</th>
          <th>Tipo guía</th>
          <th>Nombre</th>

          
          <th>Estatus</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>

        
      @foreach($guias as $guia)
      <tr id="tr.{!! $guia->id !!}">
        
        <td>{!! $guia->users->nombre !!}</td>
        <td>{!! $guia->tipos_guias->nombre !!}</td>
        <td>{!! $guia->nombre !!}</td>

        
        @if($guia->estatus == 1)
      <td>Aceptado</td>
      @endif
      @if($guia->estatus == 2)
      <td>Pendiente</td>
      @endif
        <td>
          <a class="botones" onclick="ver({!! $guia->id !!})">Detalle</a>
          @if($guia->estatus == 2)
          <a class="botones" onclick="cambiar(1,{!! $guia->id !!})">Aceptar</a>
          <a class="botones"  onclick="cambiar(2,{!! $guia->id !!})">No aceptar</a>
          @endif
          <br><br>

        </td>
      </tr>
      @endforeach 
      </tbody>
   </table>
  </div>
    <br><br>
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
