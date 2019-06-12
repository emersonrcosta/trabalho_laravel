<!DOCTYPE html>
<html>
<head>
	<title>Editar Cliente</title>
</head>
<body>
	<h1>Editar Cliente</h1>
	@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif

	@foreach ($clientes as $c)
	<form action="/clientes/gravar/{{ $p->codigo }}" method="post">
		@csrf
		<p>Nome: <input type="text" name="nome" value="{{ $c->nome }}"></p>
		<p>Data de nascimento: <input type="text" name="nascimento" value="{{ $c->nascimento }}"></p>
		<p>CPF: <input type="text" name="cpf" value="{{ $c->cpf }}"></p>
		<p>E-mail: <input type="text" name="email" value="{{ $c->email }}"></p>
		<p>Telefone: <input type="text" name="fone" value="{{ $c->fone }}"></p>
		<p><input type="submit" value="Salvar"></p>
		@endforeach
	</form>
</body>
</html>