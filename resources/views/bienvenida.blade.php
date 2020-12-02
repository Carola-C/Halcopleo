@extends('template.master')
@section('contenido_central')
<!-- Slider Start -->

<section id="slider" >
  <div class="container">
   

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner col-md-12">
          <div class="item active">
            <div class="col-md-10 col-md-offset-1">
              <div class="block">
              <h1 class="animated fadeIn">Oferta de empleo, Consejos de entrevistas, Consejos sobre curriculum y Más.</h1>
                <p class="animated fadeIn">Halcopleo es tu mejor opción para información</br> sobre el empleo y su oferta</p>
                 <img src="{!! asset('estilo/img/entrevista.jpg') !!}" alt="Img" class="animated fadeIn" width="450px">   
              </div>
            </div>
          </div>

          <div class="item">
          <div class="col-md-10 col-md-offset-1">
              <div class="block">
                <h1 class="animated fadeIn">Encuentra el trabajo ideal.</h1>
                <p class="animated fadeIn">Aqui puedes buscar las mejores opciones de empleo</br>que se acoplen a tus necesidades</p>
                <img src="{!! asset('estilo/img/empleados.jpg') !!}" alt="Img" class="animated fadeIn" width="450px">   
              </div>
            </div>
          </div>

          <div class="item">
          <div class="col-md-10 col-md-offset-1">
              <div class="block">
                <h1 class="animated fadeIn">Contrata a tus próximos aspirantes</h1>
                <p class="animated fadeIn">Si eres una empresa, con halcopleo puedes</br> encontrar a los profecionales que necesitas.</p>
                <img src="{!! asset('estilo/img/entrevista-2.jpg') !!}" alt="Img" class="animated fadeIn" width="450px">   
              </div>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
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
          <img src="{!! asset('estilo/img/halcopleo2.png') !!}" alt="Img">
        </div>
      </div><!-- .col-md-5 close -->
    </div>
  </div>
</section>

<section id="feature">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-6">
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
        <a href="{!! asset('register') !!}" class="btn btn-view-works">Registrarse</a>
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
        <br>
        <a href="{!! asset('register') !!}" class="botonb">Registrarse</a>
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