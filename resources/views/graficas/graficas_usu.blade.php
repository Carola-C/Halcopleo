@extends('template.master')    

  @section('contenido_central')

<section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Gráficas de usuarios</h1>
                  
                </div>
              </div>
            </div>
          </div>
        </section>

  
  
@endsection()
  @section('contenido_central2')
<script src="{!! asset('code/highcharts.js') !!}"></script>
<script src="{!! asset('code/modules/data.js') !!}"></script>
<script src="{!! asset('code/modules/exporting.js') !!}"></script>
<script src="{!! asset('code/modules/accessibility.js') !!}"></script>


          

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
        Gráfica con los tipos de usuarios y su cantidad
    </p>

<div class="container">
    <table id="datatable">
        <thead>
            <tr>
                <th></th>
                
                
                <th>Activos</th>
                <th>Inactivos</th>
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($tipos_usuarios as $tipos_usuario)
            <tr>
		<th>{{$tipos_usuario->nombre}}</th>
                <td align="center">{{count($users->where('tipo_usuario_id',$tipos_usuario->id)->where('estatus',1))}}</td>
                
                
                
                <td align="center">{{count($users->where('tipo_usuario_id',$tipos_usuario->id)->where('estatus',0))}}</td>
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
 </div>
</figure>

        <script type="text/javascript">
Highcharts.chart('container', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Usurios por tipo'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Units'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
});
    </script>

  
  
@endsection()

