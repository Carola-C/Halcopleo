@extends('template.master')    
@if($ban ==1)
  @section('contenido_central')

<section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Gráficas</h1>
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
                  <a class="botones" href="{!! asset('grafica_usuarios') !!}">Gráficas de usuarios</a><br><br>
                  <a class="botones" href="{!! asset('graficas_guias') !!}">Gráficas de guias</a>
                </div>
              </div>
            </div>
          </div>
        </section>

  
  
@endsection()
@else
  @section('contenido_central')

<section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Gráficas</h1>
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
                  <a class="botones" href="{!! asset('grafica_1') !!}">Gráfica de ofertas</a><br><br>
                  <!--<a class="botones" href="{!! asset('grafica_2') !!}">Gráfica de ofertas inactivas</a>-->
                </div>
              </div>
            </div>
          </div>
        </section>

  
  
@endsection()
@endif