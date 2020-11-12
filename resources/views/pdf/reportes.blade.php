@extends('template.master')    
  

  @section('contenido_central')
  <section id="contact-form">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <a class="botones" href="{!! asset('cruds') !!}">Regresar</a>
                	<h1>Reportes</h1>
                    <div>
  	
  	
  </div>
  <div>
  	<br>
  	<br>
  	<table class="customers">
		<tr>
			<th>Id</th>
			<th>Reporte</th>
			<th>Ver</th>
			<th>Descargar</th>
			
		</tr>
		
		<tr>
			<td>1</td>
			<td>Reporte de empresas/ofertas</td>
			<td align="center"><a class="botones" href="{!! asset('crear_reporte_ofer_emp/1') !!}">Ver</a>
				
			<td align="center"><a class="botones" href="{!! 'crear_reporte_ofer_emp/2' !!}">Descargar</a></td>
			
		</tr> 

    <tr>
      <td>2</td>
      <td>Reporte de empresas/empleadores</td>
      <td align="center"><a class="botones" href="{!! asset('crear_reporte_empresas/1') !!}">Ver</a>
        
      <td align="center"><a class="botones" href="{!! 'crear_reporte_empresas/2' !!}">Descargar</a></td>
      
    </tr>
    <tr>
      <td>3</td>
      <td>Reporte de guías</td>
      <td align="center"><a class="botones" href="{!! asset('crear_reporte_guias/1') !!}">Ver</a>
        
      <td align="center"><a class="botones" href="{!! 'crear_reporte_guias/2' !!}">Descargar</a></td>
      
    </tr>
		
	</table>
  </div>
 
			
     </div>
              </div>
              
            </div>

          </div>
        </section>

  
	
@endsection()




