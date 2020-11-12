  @extends('template.master')  
  <script>
  	function favorito(id){
  		alert(id);
  		var asset = '{{ asset('') }}'
      var ruta = asset+'favorito/'+id;
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var favo = data;
              alert(favo);
              //var asset1 = '{{ asset('') }}'
              //var ruta1 = asset+'index_a/'+2;
              //document.getElementsById('customers').innerHTML =oferta;
              
              $('#customers').DataTable().ajax.refresh();
              
              //$('#recarga').load("recarga.blade.php");
              
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
  	}
  </script>
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalle de oferta</h1>
					
	<h2 align="left">Empresa: {!! $oferta->empresas->razon_social !!}</h2>
	<h2 align="left">Tipo oferta: {!! $oferta->tipos_ofertas->nombre !!}</h2>
	<h2 align="left">Nombre: {!! $oferta->nombre !!}</h2>
	<h2 align="left">Tiempo: {!! $oferta->tiempo !!}</h2>
	<h2 align="left">Salario: {!! $oferta->salario !!}</h2>
	<h2 align="left">Descripcion: {!! $oferta->descripcion !!}</h2>
	<h2 align="left">Entidad: {!! $oferta->entidades->nombre !!}</h2>
	<h2 align="left">Municipio: {!! $oferta->municipios->nombre !!}</h2>
	<h2 align="left">Colonia: {!! $oferta->colonia !!}</h2>
	<h2 align="left">Calle: {!! $oferta->calle !!}</h2>
	<h2 align="left">N° edificio: {!! $oferta->no_edificio !!}</h2>
	<h2 align="left">Código postal: {!! $oferta->cp !!}</h2>
	
	<br>
  
	<a class="botones" href="{!! asset('ofertas') !!}" >Regresar</a>
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
              <div class="block">
                  <div class="caja"> Prestaciones</div>
                  <div class="eti">
                    <ul>
                    @foreach($prestaciones as $prestacion)
                    <li>
                     ¬ <b>{!! $prestacion->prestaciones->nombre !!}:</b> {!! $prestacion->prestaciones->descripcion !!}
                    </li>
                    
                    @endforeach
                    </ul>
                  </div>
                  
                </div>
                


             
                    
                  
              
            </div>

          </div>
        </section>
@endsection()

