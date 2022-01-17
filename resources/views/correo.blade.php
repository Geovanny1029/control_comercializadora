<!DOCTYPE html>
<html>
<head>
	<title>Creditos Vencidos</title>
</head>
<body>
	<h2>Aviso vencimiento de crédito </h2>
	<h4>Se le notifica que la(s) siguiente(s) operación(es) ha vencido o está por vencer de acuerdo a la fecha que ha indicado</h4>
	<table>
		<tr>
			<th style="border: 1px solid black;">Referencia</th>	
			<th style="border: 1px solid black;">Cliente</th>
			<th style="border: 1px solid black;">RFC</th>
			<th style="border: 1px solid black;">Fecha Vencimiento</th>
			<th style="border: 1px solid black;">CFDI Dombart</th>
		</tr>
		@foreach($registros as $date)
		<tr>
			<td style="border: 1px solid black;">{{$date->no_operacion}}</td>
			<td style="border: 1px solid black;">{{$date->cliente->nombre_cliente}}</td>
			<td style="border: 1px solid black;">{{$date->cliente->rfc}}</td>
			<td style="border: 1px solid black;">{{$date->fecha_condicionp}}</td>
			<td style="border: 1px solid black;">{{$date->folio_cfdi}}</td>
		</tr>
		@endforeach
	</table>
	<h4><b>Este Correo es Informativo, favor de no responder</b></h4>
</body>
</html>