<!DOCTYPE html>
<html>
<head>
	<title>Entregadores</title>
</head>
<body>
	<h1>Lista de entregadores</h1>
	<table>
		<tr><th>Nome</th><th>Empresa</th><th>CPF</th><th>Celular</th></tr>
	@foreach($entregadores as $e)
		<tr>
			<td>{{$e->nome}}</td>
			<td>{{$e->empresa->nome}}</td>
			<td>{{$e->cpf}}</td>
			<td>{{$e->celular}}</td>
		</tr>
	@endforeach	
	</table>	
</body>
</html>