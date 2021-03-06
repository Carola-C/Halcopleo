@extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar postulación</h1>
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
                	{!! Form::open([ 'method' => 'PATCH' ,'url'=>'/postulaciones/'.$postulacion->id]) !!}

  
                    <div class="form-group">
                      {!! Form::label ('candidato_id','Candidato:') !!}
			{!! Form::select ('candidato_id',$users->pluck('nombre','id')->all(),$postulacion->candidato_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('oferta_id','Ofertas:') !!}
			{!! Form::select ('oferta_id',$ofertas->pluck('nombre','id')->all(),$postulacion->oferta_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                      {!! Form::label ('estado','Favorito') !!}
			{!! Form::select ('estado',array('1'=>'Favorito','0'=>'No favorito'),$postulacion->estado,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Postular','0'=>'Eliminar'),$postulacion->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar postulacion',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('postulaciones') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 