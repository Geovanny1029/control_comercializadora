<!DOCTYPE html>
<html>
<head>
	<title>Aviso vencimiento de importación temporal </title>
</head>
<body>
	<h2>Aviso vencimiento de importación temporal </h2>
	<h4>Se le notifica que la siguiente operación de importación temporal  está por vencer de acuerdo a la fecha que ha indicado</h4>
	<table>
		<tr>
			<th style="border: 1px solid black;">Referencia</th>	

			<th style="border: 1px solid black;">No Pedimento</th>
			<th style="border: 1px solid black;">Fecha de Pedimento de Importacion Temporal</th>
		</tr>
		@foreach($registros as $date)
		<tr>
			<td style="border: 1px solid black;">{{$date->no_operacion}}</td>
			<td style="border: 1px solid black;">{{$date->	no_pedimento}}</td>
			<td style="border: 1px solid black;">{{$date->fecha_pedimento_importacion}}</td>
		</tr>
		@endforeach
	</table>
		<h4><b>Este Correo es Informativo, favor de no responder</b></h4>
</body>
</html>