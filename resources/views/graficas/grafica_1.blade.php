@extends('template.master')    

  @section('contenido_central')

<section id="global-header">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="block">
                  <h1>Gráficas de ofertas</h1>
                  
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
        Cantidad de postulaciones y evaluaciones por oferta
    </p>
    
@if($ofertas===null)
<h1> Aún no hay ofertas</h1>
@else
<div class="container">
    <table id="datatable">
        <thead>
            <tr>
                <th></th>
                
                
                <th>Postulaciones</th>
                <th>Evaluados</th>
                <th>Por evaluar</th>
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($ofertas as $oferta)
            <tr>
                <th>{{$oferta->nombre}}</th>
                
                
                @if($oferta->estatus ==1)
                <td align="center">{{count($postulaciones->where('oferta_id',$oferta->id)->where('estatus',1))+count($postulaciones->where('oferta_id',$oferta->id)->where('estatus',2))}}</td>
                <td align="center">{{count($evaluaciones->where('oferta_id',$oferta->id)->where('estatus',1))}}</td>
                <?php $ban=count($postulaciones->where('oferta_id',$oferta->id)->where('estatus',1))-count($evaluaciones->where('oferta_id',$oferta->id)->where('estatus',1))?>
                <td align="center">{{$ban}}</td>
                @else
                <td align="center">{{count($postulaciones->where('oferta_id',$oferta->id)->where('estatus',2))}}</td>
                @endif
                
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
@endif
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
        text: 'Postulaciones por oferta'
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

