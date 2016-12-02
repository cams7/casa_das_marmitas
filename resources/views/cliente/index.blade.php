<!DOCTYPE html>
<html>
<head>
	<title>Clientes</title>
</head>
<body>
	<h1>Lista de clientes</h1>
	<table>
		<tr><th>Nome</th><th>Telefone</th><th>Cidade</th><th>Bairro</th></tr>
	@foreach($clientes as $c)
		<tr>
			<td>{{$c->nome}}</td>
			<td>{{$c->telefone}}</td>
			<td>{{$c->cidade}}</td>
			<td>{{$c->bairro}}</td>
		</tr>
	@endforeach	
	</table>	
</body>
</html>