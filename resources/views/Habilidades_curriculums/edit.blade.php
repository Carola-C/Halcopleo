@extends('template.master')
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Crear habilidad y curriculum</h1>
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
                  {!! Form::open([ 'method' => 'PATCH' ,'url'=>'/habilidades_curriculums/'.$habilidad_curriculum->id]) !!}
                    
                    <div class="form-group">
                      {!! Form::label ('curriculum_id','Curriculum:') !!}
                      
			{!! Form::select ('curriculum_id',$curriculums->pluck('id','id')->all(),$habilidad_curriculum->curriculum_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
      <h2>ID: {!! $habilidad_curriculum->curriculum_id !!}</h2>
                    </div>
                    <div class="form-group">
                      {!! Form::label ('habilidad_id','Habilidad:') !!}
			{!! Form::select ('habilidad_id',$habilidades->pluck('nombre','id')->all(),$habilidad_curriculum->habilidad_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
      <h2>Habilidad: {!! $habilidad_curriculum->habilidades->nombre !!}</h2>
                    </div>
                    

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),$habilidad_curriculum->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar habilidad-curriculum',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('habilidades_curriculums') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 