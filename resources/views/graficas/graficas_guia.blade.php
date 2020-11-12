@extends('template.master')    

  @section('contenido_central')

<section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Gráficas de guías</h1>
                  
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
        Gráfica con los tipos de guías y su cantidad
    </p>
<div class="container">

    <table id="datatable">
        <thead>
            <tr>
                <th></th>
                
                
                <th>Activos</th>
                <th>Inactivos</th>
                <th>Favoritos</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($tipos_guias as $tipos_guia)
            <tr>
		<th>{{$tipos_guia->nombre}}</th>
                <td align="center">{{count($guias->where('tipo_guia_id',$tipos_guia->id)->where('estatus',1))}}</td>
                <td align="center">{{count($guias->where('tipo_guia_id',$tipos_guia->id)->where('estatus',0))}}</td>
                <td align="center">{{count($guias_favoritass->where('tipo_guia_id',$tipos_guia->id))}}</td>
                
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
        text: 'Guías por tipo'
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

