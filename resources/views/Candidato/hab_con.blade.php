@extends('template.master')  

  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Añadir</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()
@if($ban==1)
  @section('contenido_central2')
<section id="contact-form">
  <div class="container">
    <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                	
                  <h1>Habilidades</h1>
                  <form action="{{route('Candidato.habilidades_a')}}" method="POST">
                  	<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                  	
                @foreach($habilidades as $habilidad)
                    @continue($banc=0)
                    @foreach($habilidades_curriculums as $habilidades_curriculum)
                    
                    @if($habilidad->id == $habilidades_curriculum->habilidad_id)
                    <input id="habilidad" type="checkbox" name="habilidad[]" checked="true" value="{{$habilidad->id}}">
                    <label>{{$habilidad->nombre}}</label><br>
                    @break($banc=true)
                    
                    @endif
                    @endforeach
                    @if($banc == 0)
                    <input id="habilidad" type="checkbox" name="habilidad[]" value="{{$habilidad->id}}">
                    <label>{{$habilidad->nombre}}</label><br>
                    @endif
                    @endforeach
                    <br><br>
                    <button type="submit">Añadir habilidades</button>
                  </form>
                  
                  
              
              </div>

          </div>
          <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                  
                  <h1>{{$msj}}</h1>
                  
              
              </div>

          </div>
    </div>
  </div>
</section>
@endsection() 
@endif

@if($ban==2)
  @section('contenido_central2')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                	
                  <h1>Conocimientos</h1>
                  <form action="{{route('Candidato.conocimientos_a')}}" method="POST">
                  	<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                   
                    @foreach($conocimientos as $conocimiento)
                    @continue($banb=0)
                    @foreach($conocimientos_curriculums as $conocimientos_curriculum)
                    @if($conocimiento->id == $conocimientos_curriculum->conocimiento_id)
                    <input id="conocimiento" type="checkbox" checked="true" name="conocimiento[]" value="{{$conocimiento->id}}">
                    <label>{{$conocimiento->nombre}}</label><br>
                    @break($banb=true)
                    @else
                    
                    @endif
                  @endforeach
                  @if($banb == 0)
                    <input id="conocimiento" type="checkbox" name="conocimiento[]" value="{{$conocimiento->id}}">
                    <label>{{$conocimiento->nombre}}</label><br>
                    @endif
                  @endforeach
                    <br><br>
                    <button type="submit">Añadir conocimientos</button>
                  </form>
                  
                  
              </div>


              
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                  
                  <h1>{{$msj}}</h1>
                  
              
              </div>

          </div>
            </div>

          </div>
        </section>
@endsection() 
@endif
 