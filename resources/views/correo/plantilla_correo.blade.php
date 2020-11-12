<!DOCTYPE html>
<html>
<head>
	<title>Correo</title>
	<style>
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
	.contenido_div{
		padding-top: 20px;
		padding-bottom: 20px;
		padding-right: 20px;
		padding-left: 20px;
		font-family: sans-serif;
	}
	.pie{
		padding-top: 20px;
		padding-bottom: 20px;
		padding-right: 20px;
		padding-left: 20px;
		font-family: sans-serif;
		background: #655E7A;
		text-align: right;
		color: white;
	}
	</style>
</head>
<body>
<div class="titulo">
	<table width="100%">
				<tr>
					<td>
						
						<img src="{{ $message->embed(public_path() . '/estilo/img/logo1.png') }}" height="60px" alt="">
						
					</td>
					<td align="center">
						<span style="color: white;">Halcopleo, la mejor plataforma para buscar empleo</span>
						
					</td>
					
				</tr>
	</table>
</div>
<div class="contenido_div"> <?=$contenido; ?></div>
<div class="pie">
	Gracias por confiar en Halcopleo
</div>
</body>
</html>