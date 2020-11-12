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
	.caja{
  font-family: sans-serif;
  color: #ffffff;
  font-size: 18px;
  font-weight: 400;
  text-align: center;
  background: #655E7A;
  margin: 0 0 25px;
  overflow: hidden;
  padding: 20px;
  border-radius: 35px 0px 35px 0px;
  -moz-border-radius:35px 0px 35px 0px;
  -webkit-border-radius: 35px 0px 35px 0px;
  border: 2px solid #5878ca;
}
	.eti{
  font-family: sans-serif;
  color: #655E7A;
  font-size: 18px;
  font-weight: 400;
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  padding-right: 10px;
  border: 2px solid #655E7A;
  margin: 10px;
  padding: 20px;
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
						<span >Halcopleo, la mejor plataforma para buscar empleo</span>
						
					</td>
					
				</tr>
	</table>
</div>
<div class="contenido_div"> 
	<h2 style="color: #655E7A;"><?=$tipo; ?></h2>
	<h2 style="color: #655E7A;">Empresa: <?=$empresa; ?></h2>
	<h2 style="color: #655E7A;">Oferta: <?=$oferta; ?></h2>	
	<div class="caja" > Comentarios </div>
                 <div class="eti" >
                 	<?=$contenido; ?>
                 </div>
</div>

<div class="pie">
	Gracias por confiar en Halcopleo
</div>
</body>
</html>