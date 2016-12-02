<!DOCTYPE html>
<html>
<head>
	<title>Funcionarios</title>
</head>
<body>
	<h1>Lista de funcionario</h1>
	<table>
		<tr><th>Nome</th><th>E-mail</th><th>Cargo</th></tr>
	@foreach($funcionarios as $f)
		<tr>
			<td>{{$f->user->name}}</td>
			<td>{{$f->user->email}}</td>
			<td>{{$f->cargo}}</td>
		</tr>
	@endforeach	
	</table>	
</body>
</html>