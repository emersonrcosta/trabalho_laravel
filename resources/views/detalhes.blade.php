<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Clientes</title>
</head>
<body>
@foreach ($cliente as $c)
	<h1>{{ $c->nome }}</h1>
	<p>Código: {{ $c->codigo }}</p>
	<p>CPF: {{ $c->cpf }}</p>
	<p>Telefone: {{ $c->fone }}</p>
	<p><a href="/clientes">Voltar</a></p>
@endforeach
</body>
</html>