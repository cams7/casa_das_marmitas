<!DOCTYPE html>
<html>
<head>
	<title>Taxas</title>
</head>
<body>
	<h1>Lista de taxa</h1>
	<table>
		<tr><th>Tipo</th><th>Valor</th></tr>
	@foreach($taxas as $t)
		<tr>
			<td>{{$t->tipo_taxa}}</td>
			<td>{{$t->taxa}}</td>
		</tr>
	@endforeach	
	</table>	
</body>
</html>