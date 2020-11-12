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
                alert("se agrego");
                $( "#mjs" ).html( data );
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
</script>
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Añadir</h1>
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
              
              
            </div>

          </div>
        </section>
@endsection() 
 