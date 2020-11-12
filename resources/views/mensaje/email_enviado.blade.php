@extends('template.master') 

  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Mensaje enviado con éxito</h1>
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
                    <div class="block">
                      <h1 id="mjs">{{$mjs}}</h1>
                      <a class="botones" href="formulario">Regresar</a>
                        
      <div>
        <br>
        <br>
        
      </div>
     
          
         </div>
                  </div>
                  
                </div>

              </div>
            </section>
            @endsection()
 

  
  




