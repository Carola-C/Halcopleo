<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="bienvenida">Bienvenido</a>
                    <a href="paises">Crud paises</a>
                    <a href="entidades">Crud entidades</a>
                    <a href="municipios">Crud municipios</a>
                    <a href="users">Crud usuarios</a>
                    <a href="tipos_usuarios">Crud tipos de usuarios</a>
                    <a href="habilidades">Crud de habilidades</a> 
                    <a href="conocimientos">Crud de conocimientos</a> 
                    <a href="experiencias">Crud de experiencias</a> 
                    <a href="estudios">Crud de estudios</a> 
                    <a href="grados_max_estudios">Crud de grados Estudios</a> 
                    <a href="curriculums">Crud de curriculums</a> 
                    <a href="habilidades_curriculums">Crud de habilidades y curriculums</a> 
                    <a href="conocimientos_curriculums">Crud de conocimientos y curriculums</a> 
                    <a href="experiencias_curriculums">Crud de experiencias y curriculums</a> 
                    <a href="estudios_curriculums">Crud de estudios y curriculums</a> 
                    <a href="empresas">Crud de empresa</a> 
                    <a href="empresas_empleadores">Crud de empresas y empleadores</a> 
                    <a href="tipos_ofertas">Crud de tipos de ofertas</a> 
                    <a href="prestaciones">Crud de prestaciones</a> 
                    <a href="ofertas">Crud de ofertas</a> 
                    <a href="prestaciones_ofertas">Crud de prestaciones y ofertas</a> 
                    <a href="postulaciones">Crud de postulaciones</a> 
                    <a href="evaluaciones_candidatos">Crud de evaluación</a>
                    <a href="tipos_guias">Crud de tipos de guias</a>
                    <a href="guias">Crud de guias</a> 
                    <a href="guias_favoritas">Crud de guias favoritas</a> 
                     
                </div>
            </div>
        </div>
    </body>
</html>
