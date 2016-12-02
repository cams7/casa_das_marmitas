<!DOCTYPE html>
<html>
<head>
	<title>Pedidos</title>
</head>
<body>
	<h1>Lista de pedidos</h1>
	<table>
		<tr><th>Cliente</th><th>Qtd total</th><th>Custo total + Taxa</th></tr>
	@foreach($pedidos as $p)
		<tr>
			<td>{{$p->cliente->nome}}</td>
			<td>{{$p->quantidade_total}}</td>
			<td>{{$p->total_pedido}}</td>
		</tr>
		<tr>
			<td colspan="3">
				<table>
					<tr><th>Produto</th><th>Qtd</th><th>Custo</th></tr>
				@foreach($p->itens as $i)
					<tr>
						<td>{{$i->produto->nome}}</td>
						<td>{{$i->quantidade}}</td>
						<td>{{$i->produto->custo}}</td>
					</tr>
				@endforeach
				</table>
			</td>
		</tr>
	@endforeach	
	</table>	
</body>
</html>