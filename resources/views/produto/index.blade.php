<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
</head>
<body>
	<h1>Lista de produtos</h1>
	<ul>
		@foreach($produtos as $p)
		<li>{{$p->nome}} ({{$p->ingredientes}})</li>
		@endforeach	
	</ul>
</body>
</html>