 @extends('template.master')  
 <script src="//code.jquery.com/jquery.min.js"></script>
<script src="jquery.numeric.js"></script>
<script >
  $(document).ready(function(){
    
    $('#calificacion_e').numeric("."); 
});
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

  function evaluacion(id){
    var com= document.getElementById("comentario_e").value;
    var cal= document.getElementById("calificacion_e").value;
    
    
    if (com===""|| cal==="") {
      alert("Llenar todos los datos");
    }else{
      if(isNaN(cal)){
        alert("Agregar un número válido");
      }else{
        var asset = '{{ asset('') }}'
      var ruta = asset+'editar_e/'+id+'/'+cal+'/'+com;
      
      $.ajax({
            type: 'GET',
            url: ruta,
            success:function(data){
              var datos = data;
              
              $('#mjs').html( datos );
            },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
    })
      }
      
      
      
    }
  }
</script>
  @section('contenido_central') 
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">

            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Currículum</h1>
          <h2 align="left">Número de postulación: {!! $postulacion->id !!}</h2>
  <h2 align="left">Candidato: {!! $postulacion->users->nombre !!} {!! $postulacion->users->ap_pat !!} {!! $postulacion->users->ap_mat !!} </h2>
  
  <h2 align="left">Oferta: {!! $postulacion->ofertas->nombre !!}</h2>
  <h2 align="left">Oferta: {!! $postulacion->candidato_id !!}</h2>

  <br>
  <a class="botones" href="{!! asset('postulaciones') !!}">Regresar</a> 
          
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
@section('contenido_central3')
<section id="contact-form">
  <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="row">
          <div class="block">
                  <div class="caja"> Evaluación </div>
                  <div class="eti">
                    
                    @if($ban == 0)
                    {!! Form::open(['url'=>'/evaluaciones_candidatos']) !!}
 
                    <div class="form-group">
                      {!! Form::hidden ('email_c',$postulacion->users->email,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                      
      {!! Form::hidden ('postulacion_id',$postulacion->id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('calificacion','Calificación:') !!}
      {!! Form::text ('calificacion',null,['placeholder'=>'Ingresa calificación','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('comentario','Comentarios:') !!}
      {!! Form::textarea ('comentario',null,['placeholder'=>'Ingresa comentarios','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
      {!! Form::hidden ('estatus',1,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar evaluación',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                    @else
                    @foreach($evaluacion as $eval)
                    <form>
                      <div class="form-group">
                        {!! Form::hidden ('email_c1',$postulacion->users->email,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                      </div>
                    <div class="form-group">
                      
                      <input type="hidden" name="id_e" id="id_e" value="{!!$eval->id!!}" class="form-control">
                      <label>Calificación:</label>
                      <input type="text" name="calificacion_e" id="calificacion_e" value="{!!$eval->calificacion!!}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Coloca una breve descripción de tu persona:</label>
                      <textarea name="comentario_e" class="form-control" id="comentario_e">{!!$eval->comentario!!}</textarea>
                      
                    </div>
                  </form>
                    <a class="botones" onclick="evaluacion({!!$eval->id!!})">Editar</a>
                    <div  id = "mjs1">
                    @endforeach
                    @endif
                    <div id="mjs">
                      
                    </div>
                    
                  </div>
                  
                </div>      
              
      </div>
  </div>
</section>
@endsection()

