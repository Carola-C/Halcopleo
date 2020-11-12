<!DOCTYPE html>
<html>
<head>
	<title>Reporte</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
</head>

<style>
	.customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.customers td, .customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #655E7A;
  color: white;
}
	.primer{
		padding-top: 50px;
		padding-bottom: 50px;
		padding-right: 50px;
		padding-left: 50px;
	}
	.titulo{
		padding-top: 20px;
		padding-bottom: 20px;
		padding-right: 20px;
		padding-left: 20px;
		background: #655E7A;
	}
	.titulo span{
		text-align: center;
		padding-right: 20px;
		padding-left: 20px;
		color: white;
	}
	.centro{
		padding-top: 20px;
		padding-bottom: 20px;
		padding-right: 20px;
		padding-left: 20px;
		text-align: center;
	}

</style>
<body>
	<div class="primer">
		<div class="titulo">
			<table width="100%">
				<tr>
					<td>
						<img src="{!! asset('estilo/img/logo1.png') !!}" height="60px" alt="Logo">
					</td>
					<td align="center">
						<span >Halcopleo, la mejor plataforma para buscar empleo</span>
						<br>
						<span>Reporte de las ofertas de empresas registradas</span>
					</td>
					<td align="right" >
						<span>Fecha:</span>
						<br>
						<span>{!! $date !!}</span>
					</td>
				</tr>
			</table>
		</div>

		<div class="centro">
			<h1>Reporte</h1>
			<table id="tabla" class="customers">
		<tr>
			<th>Id</th>
			<th>Nombre</th>
			<th>Ofertas</th>
			<th>Aceptadas</th>
			<th>Rechazadas</th>
		</tr>
		@foreach($empresas as $empresa)
		<tr>
			<td>{!! $empresa->id !!}</td>
			<td>{!! $empresa->razon_social !!}</td>
			<td>{{count($oferta->where('empresa_id',$empresa->id))}}</td>
			<td>{{count($oferta->where('empresa_id',$empresa->id)->where('estatus',1))}}</td>
			<td>
				{{count($oferta->where('empresa_id',$empresa->id)->where('estatus',3))}}
			</td>
		</tr> 
		@endforeach	
	</table>
		</div>
		
	</div>

</body>
</html>