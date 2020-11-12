@extends('template.master')    

  <script >
    /*
    $('#tabla').DataTable().ajax.refresh();
    
    document.getElementsById('tabla').DataTable().ajax.refresh();
    //$('#customers').DataTable().ajax.refresh();
    $(document).ready(function() {
    //$('#customers').DataTable().ajax.refresh();
    $('#tabla').DataTable();
} );
    */
  	function ver(id){
  		var asset = '{{ asset('') }}'
    	var ruta = asset+'mostrar/'+id;
    	
    	$.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){

              var oferta = data;
              alert(oferta);
              $('#tabla').DataTable().ajax.refresh();

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
      var ruta = asset+'cambiar/'+tipo+'/'+id;
      if (confirm("¿Seguro de realizar la siguiente acción?")) {
        
        $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){

              var oferta = data;
              //var asset1 = '{{ asset('') }}'
              //var ruta1 = asset+'index_a/'+2;
              //document.getElementsById('customers').innerHTML =oferta;

              //$('#customers').DataTable().clear().draw();
              location.reload();
              
              //$('#tabla').DataTable().ajax.refresh();
              //$('#customers').DataTable().ajax.url().load();
              /*
              $("#customers tbody tr a.botones").on("click", function(){
                $(this).parents("tr").revome();
              })
              //$('#tr'+fil).revome();
              //$('#recarga').load("ofertas.blade.php");
              
              /*
              for (var i = 0; i < oferta.length; i++) {
                $('#customers').append('<tr><td>'+ oferta[i].empresas + '</td><td>'+ oferta[i].tipos_ofertas+'</td><td>'+oferta[i].nombre+'</td><td>'+oferta[i].salario+'</td></tr>');
              }
              alert(oferta);
              */
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
                  <h1>Ofertas</h1>
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
                <a class="botones" href="{!! asset('vist_ofer') !!}">Regresar</a>
                <br>
                <br>
                <div class="block" id="recarga">
                  <h1>Listado de ofertas</h1>
  <div class="container">
    <br>
    <br>
    <table id="tabla" class="customers">
      <thead>
        <tr>
          <th>Empresa</th>
          <th>Tipo oferta</th>
          <th>Nombre</th>
          <th>Salario</th>
          
          <th>Estatus</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>

        
      @foreach($ofertas as $oferta)
      <tr id="tr.{!! $oferta->id !!}">
        
        <td>{!! $oferta->empresas->razon_social !!}</td>
        <td>{!! $oferta->tipos_ofertas->nombre !!}</td>
        <td>{!! $oferta->nombre !!}</td>
        <td>{!! $oferta->salario !!}</td>
        
        
        @if($oferta->estatus == 2)
        <td>Pendiente</td>
        @endif
        @if($oferta->estatus == 1)
        <td>Aceptado</td>
        @endif

        <td>
          <a class="botones" onclick="ver({!! $oferta->id !!})">Detalle</a>
          @if($oferta->estatus == 2)
          <a class="botones" onclick="cambiar(1,{!! $oferta->id !!})">Aceptar</a>
          <a class="botones"  onclick="cambiar(2,{!! $oferta->id !!})">No aceptar</a>
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
