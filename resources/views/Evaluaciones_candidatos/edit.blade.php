@extends('template.master') 
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar Evaluación</h1>
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
                	{!! Form::open([ 'method' => 'PATCH' ,'url'=>'/evaluaciones_candidatos/'.$evaluacion_candidato->id]) !!} 
        
                    
                    <div class="form-group">
                      {!! Form::label ('postulacion_id','Postulación:') !!}
			{!! Form::select ('postulacion_id',$postulaciones->pluck('id','id')->all(),$evaluacion_candidato->postulacion_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('calificacion','Calificación:') !!}
			{!! Form::text ('calificacion',$evaluacion_candidato->calificacion,['placeholder'=>'Ingresa calificación','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('comentario','Comentarios:') !!}
			{!! Form::textarea ('comentario',$evaluacion_candidato->comentario,['placeholder'=>'Ingresa comentarios','class'=>'form-control']) !!}
                    </div>
                    

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Aceptado','0'=>'Denegado'),$evaluacion_candidato->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar evaluación',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('evaluaciones_candidatos') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 