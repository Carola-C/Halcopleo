@extends('template.master')   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar experiencia y curriculum</h1>
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
                	{!! Form::open([ 'method' => 'PATCH' ,'url'=>'/experiencias_curriculums/'.$experiencia_curriculum->id]) !!}
                  

                     
       
                    
                    <div class="form-group">
                      {!! Form::label ('curriculum_id','Curriculum') !!}
			{!! Form::select ('curriculum_id',$curriculums->pluck('id','id')->all(),$experiencia_curriculum->curriculum_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('experiencia_id','Experiencia:') !!}
			{!! Form::select ('experiencia_id',$experiencias->pluck('descripcion','id')->all(),$experiencia_curriculum->experiencia_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    

                    <div class="form-group">
                      {!! Form::label ('estatus','Estatus') !!}
			{!! Form::select ('estatus',array('1'=>'Activo','0'=>'Baja'),$experiencia_curriculum->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar experiencia-curriculum',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br>
			<br>
			
			<a class="botones" href="{!! asset('experiencias_curriculums') !!}">Regresar</a>
                </div>
              </div>
              
            </div>

          </div>
        </section>
@endsection() 
 