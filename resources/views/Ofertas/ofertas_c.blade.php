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
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Catálogo de Ofertas</h1>
                    <div>
    <a class="botones" href="postulaciones/">Mis postulaciones</a>
    <a class="botones" href="index_f/">Favoritos</a>
    
  </div>
  <div>
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
    @continue($ban= 0)
    <tr>
      
      <td>{!! $oferta->empresas->razon_social !!}</td>
      <td>{!! $oferta->tipos_ofertas->nombre !!}</td>
      <td>{!! $oferta->nombre !!}</td>
      <td>{!! $oferta->salario !!}</td>
      @if($oferta->estatus == 1)
      <td>Aceptado</td>
      @endif
      @if($oferta->estatus == 2)
      <td>Pendiente</td>
      @endif
      @if($oferta->estatus == 3)
      <td>No aceptado</td>
      @endif
      
      <td>
        <?php $ban=false;?>
        @foreach($favs as $fav)
        
          @if($fav->oferta_id == $oferta->id)
          <a id="{{$oferta->id}}" value="1" onclick="prueba({{$oferta->id}})">
              <img id="oferta{{$oferta->id}}" style="cursor:pointer;" src="{!! asset('estilo/img/corazon2.png') !!}">
            </a>
            <?php $ban=true;?>
            
          @endif
        @endforeach
        
        @if($ban== 0)
        <a id="{{$oferta->id}}" value="0" onclick="prueba({{$oferta->id}})">
              <img id="oferta{{$oferta->id}}" style="cursor:pointer;" src="{!! asset('estilo/img/corazon1.png') !!}">
            </a>
        @endif
        
        
            <a class="botones" href="{!! 'show1/'.$oferta->id !!}">Detalle</a>

            <?php $ban1=false;?>
            @foreach($postulaciones as $postulacion)
            @if($postulacion->oferta_id == $oferta->id)
            <a id="post{{$oferta->id}}" class="botones" value="0" onclick="postular({{$oferta->id}})">Dejar de postular</a>
            
            <?php $ban1=true;?>
            @endif
            @endforeach
            @if($ban1 == 0)
            <a class="botones" onclick="postular({{$oferta->id}})">Postular</a>
            
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

