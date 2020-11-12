@extends('template.master')
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Iniciar sesión</h1>
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
                <div class="block">
                  <div class="card-body">
                    {!! Form::open(['url'=>'/login']) !!}
                
                    
                    <div class="form-group">
                      {!! Form::label ('email','Correo:') !!}
            {!! Form::email ('email',null,['placeholder'=>'Ingresa tu correo','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('password','Contraseña:') !!}<br>
            {!! Form::text ('password',null,['placeholder'=>'Ingresa tu contraseña','class'=>'form-control']) !!}
                    </div>
                    

                    
                    <div class="form-group">
                  {!! Form::submit('Aceptar',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                </div>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 