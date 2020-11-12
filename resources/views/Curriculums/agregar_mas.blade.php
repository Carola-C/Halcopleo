@extends('template.master')  
<script >
  function ejecutar2(){
    
    var selected ='0';
    var noselected = '0';
    $('#form2id input[type=checkbox]').each(function(){
        if (this.checked) {
            selected+=','+$(this).val();
        }else{
          noselected+=','+$(this).val();
        }
        
    });
    if (selected !='0') {
      var asset = '{{ asset('') }}'
      var ruta = asset+'agregar_habilidad/'+selected+'/'+noselected;
      
      $.ajax({
              type: 'GET',
              url: ruta,
              success: function(data){
                
                $( "#mjs" ).html( "<h1>Se modifcaron tus habilidades</h1>" );

              },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
      })

    } else {
      alert('Debes seleccionar al menos una opción.');
      
    }
    return false;
  }
  function ejecutar(){
    var selected ='0';
    var noselected = '0';
    $('#formid input[type=checkbox]').each(function(){
        if (this.checked) {
            selected+=','+$(this).val();
        }else{
          noselected+=','+$(this).val();
        }
        
    });
    if (selected !='0') {
      var asset = '{{ asset('') }}'
      var ruta = asset+'agregar_conocimiento/'+selected+'/'+noselected;
      
      $.ajax({
              type: 'GET',
              url: ruta,
              success: function(data){
                
                $( "#mjs1" ).html( data );
              },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
      })

    } 
    else {
      alert('Debes seleccionar al menos una opción.');
      
    }
    return false;
  }


</script>
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Agrega más información</h1>
                  <a class="botones" href="{!! asset('curriculums_c') !!}">Regresar</a>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
@endsection() 
@section('contenido_central3')
<section id="contact-form">
          <div class="container">
            <div class="row">
              
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                  <h1>Habilidades</h1>
                  
                  <form id="form2id">
                    @foreach($habilidades as $habilidad)
                    <input id="habilidad" type="checkbox" name="habilidad[]" value="{{$habilidad->id}}">
                    <label>{{$habilidad->nombre}}</label><br>
                    @endforeach
                  </form>
                  <button class="botones" onclick="ejecutar2()">Añadir</button>
                  <div  id = "mjs">


                  </div>
              </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                  <h1>Conocimientos</h1>
                  <form id="formid">
                    @foreach($conocimientos as $conocimiento)
                    <input id="conocimiento" type="checkbox" name="conocimiento[]" value="{{$conocimiento->id}}">
                    <label>{{$conocimiento->nombre}}</label><br>
                  @endforeach
                  </form>
                  <button class="botones" onclick="ejecutar()">Añadir</button>
                  <div  id = "mjs1">
                  </div>
                  
      
                </div>
              </div>

              
            </div>

          </div>
        </section>
@endsection() 
@section('contenido_central4')
<section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="block">
                  <div class="caja"> Estudios
                    
                  </div>
                  <div align="rigth">
                    <a class="botones" href="{!! asset('estudios') !!}">Añadir</a>
                    <br>
                  </div>
                  <br>
                      <div class="container">
                        <div class="form-group">
                          <label>Fecha de inicio</label>
                      <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <label>Fecha de fin</label>
                      <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <label>Título recibido:</label>
                      <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <label>Nombre de escuela:</label>
                      <input type="text" name="nombre_escuela" id="nombre_escuela" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <label>Pais:</label>
                      <select name="pais_id" id="pais_id">
                        <optgroup label="Seleccionar">
                          @foreach($paises as $pais)
                          <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                          @endforeach
                        </optgroup>
                      </select>
                    </div>
                     <div class="form-group">
                      <label>Ciudad:</label>
                      <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Your Name">
                    </div>
                      </div>
                      
                    
                </div>

              
            </div>

          </div>
        </section>
@endsection() 
@section('contenido_central5')
<section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="caja"> Experiencias
                    
                  </div>
                  <div align="rigth">
                    <a class="botones" href="{!! asset('experiencias/create') !!}">Añadir</a>
                    <br>
                  </div>
                  <br>
              

              
            </div>

          </div>
        </section>
@endsection() 
 
 
              