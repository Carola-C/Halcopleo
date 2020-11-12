@extends('template.master')  
<script >
  function vermas(tipo,curri){
    var asset = '{{ asset('') }}'
    var ruta = asset+'ver_mas/'+tipo+'/'+curri;
    var btn =$("#btn").val();
    
    if (btn ==1) {
      $("#btn").attr("value","0");
      $("#btn span").text("Ver menos");
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var habilidades = data;
              var n='1';
              for (var i = 0; i < habilidades.length; i++) {

                $('#hab').append('<label id="lad">'+n+'.- '+ habilidades[i].nombre+ '</label><br>');
                n++;
              }
            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
    })
    } else {
        $("#btn").attr("value","1");
        $("#hab").remove();
        $("#conten").append('<div class="eti" id="hab"></div>')
        $("#btn span").text("Ver más");
    };
    
  }

  function vermas1(tipo,curri){
    var asset = '{{ asset('') }}'
    var ruta = asset+'ver_mas/'+tipo+'/'+curri;
    var btn1 =$("#btn1").val();
    
    if (btn1 ==1) {
      $("#btn1").attr("value","0");
      $("#btn1 span").text("Ver menos");
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var habilidades = data;

              var n='1';
              for (var i = 0; i < habilidades.length; i++) {

                $('#hab1').append('<label id="lad">'+n+'.- '+ habilidades[i].nombre+ '</label><br>');
                n++;
              }
            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
    })
    } else {
        $("#btn1").attr("value","1");
        $("#hab1").remove();
        $("#conten1").append('<div class="eti" id="hab1"></div>')
        $("#btn1 span").text("Ver más");
    };
    
  }
  function vermas3(tipo,curri){
    var asset = '{{ asset('') }}'
    var ruta = asset+'ver_mas/'+tipo+'/'+curri;
    var btn2 =$("#btn2").val();
    if (btn2 == 1) {
      $("#btn2").attr("value","0");
      $("#btn2 span").text("Ver menos");
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var habilidades = data;

              var n='1';
              for (var i = 0; i < habilidades.length; i++) {

                $('#hab2').append('<a id="lad" style="cursor:pointer;"  onclick="mostrar2('+habilidades[i].id+',1)">'+n+'.- '+ habilidades[i].titulo+ '</a><br>');
                n++;
                
              }
            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
    })
    } else {
        $("#btn2").attr("value","1");
        $("#hab2").remove();
        $("#conten2").append('<div class="eti" id="hab2"></div>')
        $("#btn2 span").text("Ver más");
    };
  }
  function vermas4(tipo,curri){
    var asset = '{{ asset('') }}'
    var ruta = asset+'ver_mas/'+tipo+'/'+curri;
    var btn3 =$("#btn3").val();
    if (btn3 == 1) {
      $("#btn3").attr("value","0");
      $("#btn3 span").text("Ver menos");
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var habilidades = data;
              var n='1';
              for (var i = 0; i < habilidades.length; i++) {

                $('#hab3').append('<a id="lad" style="cursor:pointer;"  onclick="mostrar2('+habilidades[i].id+',2)">'+n+'.- '+ habilidades[i].cargo+ '</a><br>');
                n++;
                
              }
            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
    })
    } else {
        $("#btn3").attr("value","1");
        $("#hab3").remove();
        $("#conten3").append('<div class="eti" id="hab3"></div>')
        $("#btn3 span").text("Ver más");
    };
  }
  function mostrar2(id, tipo){
    
    var asset = '{{ asset('') }}'
      var ruta = asset+'mostrar2/'+id+'/'+tipo;
      
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var datos = data;
              alert(datos);
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
                  <h1>Curriculum</h1>
                  
                  @foreach($curriculum as $curri)
                  <a class="botones" href="{!! 'curriculum/'.$curri->id !!}">Editar</a>
                  @endforeach
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
                  <div class="caja"> Información personal</div>
                  <div class="eti">
                    
                    <table width="100%">
                      <tr>
                        <td width="80%">
                          @foreach($curriculum as $curri)
                    <label>Nombre:</label>
                    {!! $curri->users->nombre !!} {!! $curri->users->ap_pat !!} {!! $curri->users->ap_mat !!}<br>
                    <label>Grado máximo de estudios:</label>
                    {!! $curri->grados_max_estudios->nombre !!}<br>
                    <label>Escuela:</label>
                    {!! $curri->nombre_escuela !!}<br>
                    <label>¿Quién soy? </label>
                    {!! $curri->descripcion_candidato !!}<br>
                    <label>Teléfono:</label>
                    {!! $curri->users->telefono !!}<br>
                    <label>Correo:</label>
                    {!! $curri->users->email !!}<br>
                    @if($curri->users->no_casa == null)
                    <label>Dirección:</label>
                    {!! $curri->users->calle !!}, S/N, {!! $curri->users->colonia !!}, {!! $curri->users->municipios->nombre !!}, {!! $curri->users->entidades->nombre !!}<br>
                    @else
                    <label>Dirección:</label>
                    {!! $curri->users->calle !!}, {!! $curri->users->no_casa !!}, {!! $curri->users->colonia !!}, {!! $curri->users->municipios->nombre !!}, {!! $curri->users->entidades->nombre !!}<br>
                    @endif
                    @endforeach
                        </td>
                        <td>
                          @foreach($curriculum as $curri)
                          <img width="180px" src="{{ asset('../storage/curriculums') }}/{!! $curri->foto_ruta !!} ">
                          @endforeach
                        </td>
                      </tr>
                    </table>
                    
                    
                  </div>
                  
                </div>
              
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                  <div class="caja"> Habilidades</div>
                      <button class="bot" id="btn" value="1" onclick="vermas(1,{!! $curri->id !!} )">
                        <span>Ver más</span>
                      </button>
                      <div id="conten">
                        <div class="eti" id='hab'></div>
                      </div>
                
                  <div class="caja"> Estudios</div>
                      <button class="bot" id="btn2" value="1" onclick="vermas3(3,{!! $curri->id !!} )">
                        <span>Ver más</span>
                      </button>
                      <div id="conten2">
                        <div class="eti" id='hab2'></div>
                      </div>
                  
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                  
                  <div class="caja"> Conocimientos</div>
                      <button class="bot" id="btn1" value="1" onclick="vermas1(2,{!! $curri->id !!} )">
                        <span>Ver más</span>
                      </button>
                      <div id="conten1">
                        <div class="eti" id='hab1'></div>
                      </div>
                  
                  <div class="caja"> Experiencias</div>
                      <button class="bot" id="btn3" value="1" onclick="vermas4(4,{!! $curri->id !!} )">
                        <span>Ver más</span>
                      </button>
                      <div id="conten3">
                        <div class="eti" id='hab3'></div>
                      </div>
                </div>
              </div>
            </div>

          </div>
        </section>
@endsection() 
 