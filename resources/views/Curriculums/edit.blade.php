@extends('template.master')  
<script >
  
  function ejecutar2(){
    
    var selected ='0';
    var noselected = '0';
    $('#form2id input[type=checkbox]').each(function(){
        if (this.checked) {
            selected+=','+$(this).val();
        }else{
          noselected+=','+$(this).val();
        }
        
    });
    if (selected !='0') {
      var asset = '{{ asset('') }}'
      var ruta = asset+'agregar_habilidad/'+selected+'/'+noselected;
      
      $.ajax({
              type: 'GET',
              url: ruta,
              success: function(data){
                
                $( "#mjs" ).html( "<h1>Se modifcaron tus habilidades</h1>" );

              },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
      })

    } else {
      alert('Debes seleccionar al menos una opción.');
      
    }
    return false;
  }
  function ejecutar(){
    var selected ='0';
    var noselected = '0';
    $('#formid input[type=checkbox]').each(function(){
        if (this.checked) {
            selected+=','+$(this).val();
        }else{
          noselected+=','+$(this).val();
        }
        
    });
    if (selected !='0') {
      var asset = '{{ asset('') }}'
      var ruta = asset+'agregar_conocimiento/'+selected+'/'+noselected;
      
      $.ajax({
              type: 'GET',
              url: ruta,
              success: function(data){
                
                $( "#mjs1" ).html( data );
              },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                $('#mjs').html( "ERROR" );
              }
      })

    } 
    else {
      alert('Debes seleccionar al menos una opción.');
      
    }
    return false;
  }

  function agregar_estudio(){
    
    var fe_ini= document.getElementById("fecha_inicio_e").value;
    var fe_fin= document.getElementById("fecha_fin_e").value;
    var titulo= document.getElementById("titulo").value;
    var escuela= document.getElementById("nombre_escuela_e").value;
    var pais= document.getElementById("pais_id").value;
    var ciudad= document.getElementById("ciudad").value;
    
    if ((fe_ini==="") || (fe_fin==="")||titulo===""||escuela===""||ciudad==="") {
      alert("Llenar todos los datos");
    }else{
      if(Date.parse(fe_fin) < Date.parse(fe_ini)){
        alert('La fecha de inicio debe ser mayor a la fecha de fin')
      }else{
   
      var asset = '{{ asset('') }}'
      var ruta = asset+'agregar_estudio/'+fe_ini+'/'+fe_fin+'/'+titulo+'/'+escuela+'/'+pais+'/'+ciudad;
      
      $.ajax({
              type: 'GET',
              url: ruta,
              success: function(data){
                var estudio = data;
                $('#estudios').append('<tr><td>'+estudio.nombre_escuela+'</td><td>'+estudio.titulo+'</td><td>'+estudio.fecha_inicio+' - '+estudio.fecha_fin+'</td><td></td></tr>');
                
                //alert(estudio);
                          
                          

              },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                
              }
      })
      
      }
    }
  }

  function agregar_experiencia(){
    var fe_ini= document.getElementById("tiempo_inicio").value;
    var fe_fin= document.getElementById("tiempo_fin").value;
    var nombre= document.getElementById("nombre_lugar").value;
    var cargo= document.getElementById("cargo").value;
    var descr= document.getElementById("descripcion").value;
    var pais= document.getElementById("pais_id_e").value;
    var ciudad= document.getElementById("ciudad_e").value;
   
    
    if ((fe_ini==="") || (fe_fin==="")||nombre===""||cargo===""||ciudad===""||descr==="") {
      alert("Llenar todos los datos");
    }else{
      if(Date.parse(fe_fin) < Date.parse(fe_ini)){
        alert('La fecha de inicio debe ser mayor a la fecha de fin')
      }else{
      var asset = '{{ asset('') }}'
      var ruta = asset+'agregar_experiencia/'+fe_ini+'/'+fe_fin+'/'+nombre+'/'+cargo+'/'+descr+'/'+pais+'/'+ciudad;
      
       $.ajax({
              type: 'GET',
              url: ruta,
              success: function(data){
                alert(data);
                
                var experiencia = data;
                $('#experiencias').append('<tr><td>'+experiencia.nombre_lugar+'</td><td>'+experiencia.cargo+'</td><td>'+experiencia.descripcion+'</td><td></td></tr>');
                
                //alert(estudio);
                

              },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                
              }
      })
      }
    }
    
  }

  function fecha(fecha, tipo){
    if (tipo == 1) {
      $("#fecha_fin_e").attr("min",fecha);
    }
    if (tipo == 2) {
      $("#tiempo_fin").attr("min",fecha);
    }
    
  }
/*
  function actualizar(){
    var foto= document.getElementById("foto_ruta").value;
    var grado= document.getElementById("grado_max_id").value;
    var escuela= document.getElementById("nombre_escuela_c").value;
    var descripcion= document.getElementById("descripcion_candidato").value;
    
    var asset = '{{ asset('') }}'
      var ruta = asset+'actualizar_c/'+foto+'/'+grado+'/'+escuela+'/'+descripcion;
      
      $.ajax({
              type: 'POST',
              url: ruta,
              success: function(data){
                var estudio = data;
                
                
                
                          
                          

              },
              error:function(error){
                console.log(error);
                alert(JSON.stringify(error));
                
              }
      })
   
  }
  */

</script>
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Editar curriculum</h1>
                  <a class="botones" href="{!! asset('curriculums_c') !!}">Regresar</a>
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
              <div class="block">
                  <div class="caja"> Información personal</div>
                  <div class="eti">
                    
                    <label>Nombre:</label>
                    {!! $curriculum->users->nombre !!} {!! $curriculum->users->ap_pat !!} {!! $curriculum->users->ap_mat !!}<br>
                    <label>Teléfono:</label>
                    {!! $curriculum->users->telefono !!}<br>
                    <label>Correo:</label>
                    {!! $curriculum->users->email !!}<br>
                    @if($curriculum->users->no_casa == null)
                    <label>Dirección:</label>
                    {!! $curriculum->users->calle !!}, S/N, {!! $curriculum->users->colonia !!}, {!! $curriculum->users->municipios->nombre !!}, {!! $curriculum->users->entidades->nombre !!}<br>
                    @else
                    <label>Dirección:</label>
                    {!! $curriculum->users->calle !!}, {!! $curriculum->users->no_casa !!}, {!! $curriculum->users->colonia !!}, {!! $curriculum->users->municipios->nombre !!}, {!! $curriculum->users->entidades->nombre !!}<br>
                    @endif
                    
                  </div>
                  
                </div>
                <div class="block">
                  {!! Form::open([ 'method' => 'PATCH' ,'url'=>'/curriculums/'.$curriculum->id,'enctype'=>'multipart/form-data']) !!}

                  <div class="form-group">
                      
      {!! Form::hidden ('candidato_id',$curriculum->candidato_id,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('foto_ruta','Imagen:') !!}
      {!! Form::File ('foto_ruta',null,['placeholder'=>'Ingresa una imagen','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('grado_max_id','Último grado de estudios cursado:') !!}
      {!! Form::select ('grado_max_id',$grados_max_estudios->pluck('nombre','id')->all(),$curriculum->grado_max_id,['placeholder'=>'Seleccionar','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('nombre_escuela','Nombre de escuela donde se curso el último grado de estudio:') !!}
      {!! Form::text ('nombre_escuela',$curriculum->nombre_escuela,['placeholder'=>'Ingresa nombre de escuela','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label ('descripcion_candidato','Coloca una breve descripción de tu persona:') !!}
      {!! Form::textarea ('descripcion_candidato',$curriculum->descripcion_candidato,['placeholder'=>'Descripción','class'=>'form-control', 'required'=>'required']) !!}
                    </div>
                    
                    <div class="form-group">
                      
      {!! Form::hidden ('estatus',$curriculum->estatus,['placeholder'=>'Seleccionar','class'=>'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                  {!! Form::submit('Guardar cambios',['class'=>'botones']) !!}
                    </div>
                  {!! Form::close() !!}
                  <br><br>
                </div>


             
                    
                  
              
            </div>

          </div>
        </section>
@endsection() 
@section('contenido_central3')
<section id="contact-form">
          <div class="container">
            <div class="row">
              
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                  <h1>Habilidades</h1>
                  
                  <form id="form2id">
                    @foreach($habilidades as $habilidad)
                    @continue($ban=0)
                    @foreach($habilidades_curriculums as $habilidades_curriculum)
                    
                    @if($habilidad->id == $habilidades_curriculum->habilidad_id)
                    <input id="habilidad" type="checkbox" name="habilidad[]" checked="true" value="{{$habilidad->id}}">
                    <label>{{$habilidad->nombre}}</label><br>
                    @break($ban=true)
                    
                    @endif
                    @endforeach
                    @if($ban == 0)
                    <input id="habilidad" type="checkbox" name="habilidad[]" value="{{$habilidad->id}}">
                    <label>{{$habilidad->nombre}}</label><br>
                    @endif
                    @endforeach
                  </form>
                  <button class="botones" onclick="ejecutar2()">Añadir</button>
                  <div  id = "mjs">


                  </div>
              </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="block" id="agregar">
                  <h1>Conocimientos</h1>
                  <form id="formid">
                    @foreach($conocimientos as $conocimiento)
                    @continue($ban=0)
                    @foreach($conocimientos_curriculums as $conocimientos_curriculum)
                    @if($conocimiento->id == $conocimientos_curriculum->conocimiento_id)
                    <input id="conocimiento" type="checkbox" checked="true" name="conocimiento[]" value="{{$conocimiento->id}}">
                    <label>{{$conocimiento->nombre}}</label><br>
                    @break($ban=true)
                    @else
                    
                    @endif
                  @endforeach
                  @if($ban == 0)
                    <input id="conocimiento" type="checkbox" name="conocimiento[]" value="{{$conocimiento->id}}">
                    <label>{{$conocimiento->nombre}}</label><br>
                    @endif
                  @endforeach
                  </form>
                  <button class="botones" onclick="ejecutar()">Añadir</button>
                  <div  id = "mjs1">
                  </div>
                  
      
                </div>
              </div>

              
            </div>

          </div>
        </section>
@endsection() 
@section('contenido_central4')
<section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="block">
                  <div class="caja"> Estudios
                    
                  </div>
                  
                  <br>
                  <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  <form>
                    <div class="form-group">
                      <label>Fecha de inicio</label>
                      <input type="date" id="fecha_inicio_e" onchange="fecha(this.value,1);" name="fecha_inicio_e" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <label>Fecha de fin</label>
                      <input type="date" id="fecha_fin_e" name="fecha_fin_e" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                      <label>Título recibído:</label>
                      <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título">
                    </div>
                    
                  </form>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  <form>
                    <div class="form-group">
                      <label>Escuela donde se recibó:</label>
                      <input type="text" id="nombre_escuela_e" name="nombre_escuela_e" class="form-control" placeholder="Escuela">
                    </div>
                    <div class="form-group">
                      <label>País:</label>
                      <select name="pais_id" id="pais_id">
                        <optgroup label="Seleccionar">
                          @foreach($paises as $pais)
                          <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                          @endforeach
                        </optgroup>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Ciudad:</label>
                      <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad">
                    </div>
                    
                  </form>
                  
                    <a class="botones" onclick="agregar_estudio()">Añadir</a>
                    <br>
                  
                </div>
              </div>
            </div>

                  <br>
                      <div class="container">
                        <table id="estudios" class="customers">
                          <thead>
                      <tr>
                        
                        <th>Escuela</th>
                        <th>Título</th>
                        
                        <th>Periodo</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($estudios_curriculums as $estudio_curriculum)
                      <tr>
                        
                        <td>{!! $estudio_curriculum->estudios->nombre_escuela !!}</td>
                        <td>{!! $estudio_curriculum->estudios->titulo !!}</td>
                        
                        <td>{!! $estudio_curriculum->estudios->fecha_inicio !!} - {!! $estudio_curriculum->estudios->fecha_fin !!}</td>
                        <td>
                          <br>
                          <a class="botones" href="{!! asset('estudios_curriculums/'.$estudio_curriculum->id) !!}">Ver</a>
                          <!-- <a class="botones" href="{!! 'estudios_curriculums/'.$estudio_curriculum->id !!}">Detalle</a> -->
                          <a class="botones" href="{!! asset('estudios/'.$estudio_curriculum->estudio_id.'/edit') !!}">Editar</a>
                          
                          <br><br>
                          {!! Form ::open(['method'=>'DELETE' , 'url' =>'/estudios_curriculums/'.$estudio_curriculum->id])!!}
                            {!! Form::submit('Eliminar',['class'=>'botones']) !!}
                            {!! Form::close() !!}
                        </td>
                      </tr>
                      </tbody>
                      @endforeach 
                    </table>
                      </div>
                    
                </div>

              
            </div>

          </div>
        </section>
@endsection() 
@section('contenido_central5')
<section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="caja"> Experiencias
                    
                  </div>
                  
                  <div class="row">
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  <form>
                    <div class="form-group">
                      <label>Fecha de inicio</label>
                      <input type="date" id="tiempo_inicio" onchange="fecha(this.value,2);" name="tiempo_inicio" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                      <label>Fecha de fin</label>
                      <input type="date" id="tiempo_fin" name="tiempo_fin" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                      <label>Lugar donde se trabajó:</label>
                      <input type="text" id="nombre_lugar" name="nombre_lugar" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <label>Cargo ocupado:</label>
                      <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo">
                    </div>
                    
                  </form>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="block">
                  <form>
                    <div class="form-group">
                      <label>Describe brevemente tus actividades:</label><br>
                      <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                      <label>País:</label>
                      <select name="pais_id_e" id="pais_id_e">
                        <optgroup label="Seleccionar">
                          @foreach($paises as $pais)
                          <option value="{{$pais->id}}">{{$pais->nombre}}</option>
                          @endforeach
                        </optgroup>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Ciudad:</label>
                      <input type="text" id="ciudad_e" name="ciudad_e" class="form-control" placeholder="Ciudad">
                    </div>
                    
                  </form>
                  
                    <a class="botones" onclick="agregar_experiencia()">Añadir</a>
                    <br>
                  
                </div>
              </div>
            </div>


                  <br>
              <table id="experiencias" class="customers">
                <thead>
    <tr>
      <th>Lugar</th> 
      <th>Cargo</th>
      <th>Descripción</th>
      
      
      <th>Acciones</th>
    </tr>
    </thead>
      <tbody>
    @foreach($experiencias_curriculums as $experiencia_curriculum)
    <tr>
      <td>{!! $experiencia_curriculum->experiencias->nombre_lugar !!}</td>
      <td>{!! $experiencia_curriculum->experiencias->cargo !!}</td>
      <td>{!! $experiencia_curriculum->experiencias->descripcion !!}</td>
      
      
      <td>
        <br>
        <a class="botones" href="{!! asset('experiencias/'.$experiencia_curriculum->id) !!}">Detalle</a>
        <a class="botones" href="{!! asset('experiencias/'.$experiencia_curriculum->id.'/edit') !!}">Editar</a>
        <br><br>
        {!! Form ::open(['method'=>'DELETE' , 'url' =>'/experiencias_curriculums/'.$experiencia_curriculum->id])!!}
          {!! Form::submit('Eliminar',['class'=>'botones']) !!}
          {!! Form::close() !!}
      </td>
    </tr>
    @endforeach 
    </tbody>
  </table>

              
            </div>

          </div>
          <script>
  
  $(document).ready(function(){
    $('#estudios').DataTable();
  $('#experiencias').DataTable();
  });
</script>
        </section>
@endsection() 
 
 
              