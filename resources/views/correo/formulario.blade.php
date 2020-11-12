@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
@if(session('message'))
      <div class="alert alert-success">
            {{ session('message') }}
      </div>
      @endif

        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Nuevo correo</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
  @section('contenido_central2')
  <section id="contact-form">
    
          <div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="row">
             @if(session('message'))
      <div class="alert alert-success">
            {{ session('message') }}
      </div>
      @endif
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  {!! Form::open(['url'=>'/enviar_correo','role'=>'form','enctype'=>'multipart/form-data']) !!}

                    <div class="form-group">
                      {!! Form::label ('destinatario','Para:') !!}
      {!! Form::text ('destinatario',null,['placeholder'=>'Ingresa correo','required','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('asunto','Asunto:') !!}
      {!! Form::text ('asunto',null,['placeholder'=>'Ingresa asunto','required','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('contenido_mail','Contenido:',['class'=>'control-label']) !!}
      {!! Form::textarea ('contenido_mail',null,['placeholder'=>'Contenido','required','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Enviar correo',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
      <br>
      
      <a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
      @if(session('message'))
      <div class="alert alert-success">
            {{ session('message') }}
      </div>
      @endif
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection()
