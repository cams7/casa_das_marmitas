<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
</head>
<body>
	<h1>Lista de produtos</h1>
	<table>
		<tr><th>Nome</th><th>Ingredientes</th><th>Custo</th><th>Tamanho</th></tr>
	@foreach($produtos as $p)
		<tr>
			<td>{{$p->nome}}</td>
			<td>{{$p->ingredientes}}</td>
			<td>{{$p->custo}}</td>
			<td>{{$p->tamanho}}</td>
		</tr>
	@endforeach	
	</table>	
</body>
</html>