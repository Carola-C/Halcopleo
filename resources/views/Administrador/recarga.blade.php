<h1>Listado de ofertas</h1>
  <div class="container">
    <br>
    <br>
    <table id="customers">
      <thead>
        <tr>
          <th>Empresa</th>
          <th>Tipo oferta</th>
          <th>Nombre</th>
          <th>Salario</th>
          
          <th>Estatus</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
      @foreach($ofertas as $oferta)
      <tr>
        
        <td>{!! $oferta->empresas->razon_social !!}</td>
        <td>{!! $oferta->tipos_ofertas->nombre !!}</td>
        <td>{!! $oferta->nombre !!}</td>
        <td>{!! $oferta->salario !!}</td>
        
        <td>{!! $oferta->estatus !!}</td>
        <td>
          <a class="botones" onclick="ver({!! $oferta->id !!})">Detalle</a>
          @if($oferta->estatus == 2)
          <a class="botones" onclick="cambiar(1,{!! $oferta->id !!})">Aceptar</a>
          <a class="botones" onclick="cambiar(2,{!! $oferta->id !!})">No aceptar</a>
          @endif
          <br><br>

        </td>
      </tr>
      @endforeach 
      </tbody>
   </table>
  </div>
    <br><br>