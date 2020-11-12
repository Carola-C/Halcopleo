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
						<span>Reporte de los empleadores de las empresas</span>
					</td>
					<td align="right" >
						<span>Fecha:</span>
						<br>
						<span>{!! $date !!}</span>
					</td>
				</tr>
			</table>
		</div>
		<br>
		<span>En el siguiente documento se encontrará todos los usuarios que esten activos o inactivos en una empresa en concreto</span>
		@foreach($empresas as $empresa)
		<div class="centro">
			<h1>{!! $empresa->razon_social !!}</h1>
			<table id="tabla" class="customers">
		<tr>
			
			<th>ID empleador</th>
			<th>Nombre empleador</th>
			<th>Correo</th>
			<th>Estatus</th>
			
		</tr>
		@foreach($empleadors as $empleador)
		@if($empresa->id == $empleador->empresa_id)
		<tr>
			
			<td width="5%">{!! $empleador->users->id !!}</td>
			<td>{!! $empleador->users->nombre !!} {!! $empleador->users->ap_pat !!} {!! $empleador->users->ap_mat !!}</td>
			<td>{!! $empleador->users->email !!}</td>
			@if($empleador->estatus == 1)
			<td>Activo</td>
			@endif
			@if($empleador->estatus == 0)
			<td>Inactivo</td>
			@endif
			
			
		</tr> 
		@endif
		@endforeach	
	</table>
	@endforeach
		</div>
		
	</div>

</body>
</html>