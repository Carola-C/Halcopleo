@extends('template.master')
  @section('contenido_central')
  <!-- Slider Start -->
    <section id="slider">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-2">
            <div class="block">
              <h1 class="animated fadeInUp">Oferta de empleo, consejos de entrevistas, consejos sobre curriculum y más</h1>
              <p class="animated fadeInUp">Halcopleo es tu mejor opción para información</br> sobre el empleo y su oferta</p>
            </div>
          </div>
        </div>
      </div>
    </section>

  @endsection()
  @section('contenido_central2')

 <!-- Wrapper Start -->
    <section id="intro">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-12">
            <div class="block">
              <div class="section-title">
                <h2>¿Qué es Halcopleo?</h2>
                <p>Es la nueva plataforma virtual para la búsqueda y oferta de empleo que se necesita</p>
              </div>
              <p>Aquí puedes encontrar las oferta de empleo disponibles y como empleador ofertarás tus empleos. También es una fuente informativa para el ingreso de consejos sobre entrevistas, generación de curriculum y preguntas frecuentes sobre la búsqueda de empleo </p>
            </div>
          </div><!-- .col-md-7 close -->
          <div class="col-md-5 col-sm-12">
            <div class="block">
              <img src="{!! asset('estilo/img/qeh.jpg') !!}"  alt="Img">
            </div>
          </div><!-- .col-md-5 close -->
        </div>
      </div>
    </section>

  <section id="feature">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-6" >
          <h2 style="color: #fff;">¿Quieres promocionar tus empleos?</h2>
          <p>
          <font color="white">
            Aquí puedes promocionar los empleos que tienes vigentes y así estarán disponibles para que otros lo vean y te contacten
          </font>
          </p>
          <p>
          <font color="white">
            Entre nuestros usuarios puede estar tu siguiente empleado, podras mirar el perfil de los candidatos al empleo y escoge alguno de ellos.
          </font>
          </p>
          <a href="#" class="btn btn-view-works">Registrarse</a>
        </div>
      </div>
    </div>
  </section>
        
    <!-- Service Start -->
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2>¿Buscas empleo?</h2>
            <p>Te ofrecemos un buen lugar para que veas las ofertas registradas por nuestros usuarios empleadores, podrás observar toda la información sobre el emplo requerido</p>
            <p>
              Además de que si tienes alguna duda de cómo generar tu curriculum o como presentarte a una entrevista, podrás obervar diferentes consejos sobre el tema que te ayudarán
            </p>
            <p>Y no solo eso, también tú nos puedes ayudar añadiendo tu experiencia en este campo, solo necesitas registrarte</p>
            <button name="Registrarse" style="background: #F7931E; color: #fff; padding: 10px 20px; border-radius: 10px; font-weight: bold;">Registrarse</button>
             
          </div>
        </div>
      </div>
    </section>
    <!-- Call to action Start -->
    <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="block">
              <h2>Siempre al servicio de nuestra comunidad.</h2>
              <p>Halcopleo se preocupa por las dudas existentes sobre el tema del empleo, para las personas que inician esta etapa en su vida pueden confiar en la plataforma.</p>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    @endsection()