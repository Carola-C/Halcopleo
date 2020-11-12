@extends('template.master')    
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar estudio y curriculum</h1>
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
                  {!! Form::open([ 'method' => 'PATCH' ,'url'=>'/estudios_curriculums/'.$estudio_curriculum->id]) !!}
                  

                     
       
                    
                    <div class="form-group">
                      {!! Form::label ('curriculum_id','Curriculum') !!}
			{!! Form::select ('curriculum_id',$curriculums->pluck('id','id')->all(),$estudio_curriculum->curriculum_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('estudio_id','Estudios:') !!}
			{!! Form::select ('estudio_id',$estudios->pluck('titulo','id')->all(),$estudio_curriculum->estudio_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),$estudio_curriculum->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar estudio-curriculum',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('estudios_curriculums') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 