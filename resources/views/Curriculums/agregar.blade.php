@extends('template.master')  

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
                	
              <a class="botones" href="{!! asset('opciones/1') !!}">Habilidades</a>
              <br><br>
              <a class="botones" href="{!! asset('opciones/2') !!}">Conocimientos</a>
              <br><br>
              <a class="botones" href="experiencias/create">Experiencias</a>
              </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                	
              <a  class="botones"href="estudios/create">Estudios</a>
              <br><br><br>
              <a class="botones" href="{!! asset('curriculums_c') !!}">Finalizar</a>
              
              </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 