  @extends('template.master')  
  <script>
  	function prueba(id){
      

    var id2= "oferta"+id;
    var iman=document.getElementById(id2).src;
    
    var favorito ="{!! asset('estilo/img/corazon2.png') !!}";
    
    if (iman === favorito) {
      var asset = '{{ asset('') }}'
      var ruta = asset+'favorito/'+id;
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
      var ruta = asset+'favorito/'+id;
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
/*
      var asset = '{{ asset('') }}'
      var ruta = asset+'favorito/'+id;
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var favo = data;
              alert(favo);
              
              
              location.reload();
              
            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
        })
        */
    }

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
                  <h1>Información de la oferta</h1>
					<!--<h2 align="left">ID: {!! $oferta->id !!}</h2>-->
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
	<h2 align="left">Estatus: {!! $oferta->estatus !!}</h2>
	<br>
  @if($postulacion== null)
  <a class="botones" onclick="postular({{$oferta->id}})">Postular</a>
  @else
  @if($postulacion->estado== 1)
	<a id="{{$oferta->id}}" value="1" onclick="prueba({{$oferta->id}})">
              <img id="oferta{{$oferta->id}}" style="cursor:pointer;" src="{!! asset('estilo/img/corazon2.png') !!}">
            </a>
  @endif
  @if($postulacion->estado== 0)
  <a id="{{$oferta->id}}" value="0" onclick="prueba({{$oferta->id}})">
              <img id="oferta{{$oferta->id}}" style="cursor:pointer;" src="{!! asset('estilo/img/corazon1.png') !!}">
            </a>
  @endif
  
            @if($postulacion->estatus == 1)
            <a id="post{{$oferta->id}}" class="botones" value="0" onclick="postular({{$oferta->id}})">Dejar de postular</a>
            
            @endif
            
            @if($postulacion->estatus == 0)
            <a class="botones" onclick="postular({{$oferta->id}})">Postular</a>
            
            @endif
  @endif
  
            <br><br>
	<a class="botones" href="{!! asset('vist_ofer') !!}" >Regresar</a>
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

