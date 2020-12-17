@extends('template.master') 

@if($ban==0)   
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Escoge o crea una empresa, una vez escogida no podrá ser modificada</h1>
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
                  <div class="col-md-12">
                    <div class="block">
                      <h1>Catálogo de Empresas</h1>
                        <div>
        <a class="botones" href="empresas/create">Crear</a>
        
      </div>
      <div>
        <br>
        <br>
        <table id="tabla" class="customers">
      <thead>
        <tr> 
          <th>ID</th>
          <th>Nombre</th>
          <th>RFC</th>
          
          <th>Acciones</th>
        </tr>
        </thead>
      <tbody>
        @foreach($empresas as $empresa)
        <tr>
          <td>{!! $empresa->id !!}</td>
          <td>{!! $empresa->razon_social !!}</td>
          <td>{!! $empresa->rfc !!}</td>
          
          <td>
            <a class="botones" href="{!! 'unir_em/'.$empresa->id !!}">Seleccionar</a>
            
          </td>
        </tr>
        @endforeach 
        </tbody>
      </table>
      </div>
     
<script type="text/javascript">
  $('#tabla').DataTable();
</script>  
         </div>
                  </div>
                  
                </div>

              </div>
            </section>
            @endsection()
  @else
  @section('contenido_central')
<!-- Slider Start -->
        <section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Detalles de empresa</h1>
                  
      @foreach($empresas as $empresa)
      <img align="center" src="{{ asset('../storage/empresas') }}/{!! $empresa->foto_ruta !!}" width="200px">
  <h2 align="left">Nombre: {!! $empresa->razon_social !!}</h2>
  <h2 align="left">RFC: {!! $empresa->rfc !!}</h2>
  <h2 align="left">Entidad: {!! $empresa->entidades->nombre !!}</h2>
  <h2 align="left">Municipio: {!! $empresa->municipios->nombre !!}</h2>
  <h2 align="left">Colonia: {!! $empresa->colonia !!}</h2>
  <h2 align="left">Calle: {!! $empresa->calle !!}</h2>
  <h2 align="left">N°: {!! $empresa->no_edificio !!}</h2>
  <h2 align="left">Código postal: {!! $empresa->cp !!}</h2>
  
  <br>
  
      @endforeach
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection()

  @endif
  

  
  




