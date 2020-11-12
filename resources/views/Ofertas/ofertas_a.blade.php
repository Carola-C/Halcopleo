@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Ofertas</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
  <section id="service">
      <div class="container">
        
        <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  <ul class="social-icons">  
        <div class="row ">
          
          
          <div class="col-sm-6 col-md-3">
            <div class="service-item">
              <li>
                <a href="{{ asset('index_a/1') }}"><i class="ion-leaf"></i></a>
                <h4>Aceptados</h4>
              </li>
            </div>
          </div>
          
          
          
          
          
        </div>

        </ul>
      

                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  <ul class="social-icons">  
        <div class="row ">
          
          
          
          <div class="col-sm-6 col-md-3">
            <div class="service-item">
              <li>
                <a href="{{ asset('index_a/2') }}"><i class="ion-clock"></i></a>
                <h4>Pendientes</h4>
              </li>
            </div>
          </div>
          
          
          
        </div>

        </ul>

                </div>
              </div>
              
            </div>
      </div> 

    </section>
  
@endsection() 
 