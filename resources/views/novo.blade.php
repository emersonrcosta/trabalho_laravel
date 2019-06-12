<!DOCTYPE html>
<html>
<head>
	<title>Novo Cliente</title>
</head>
<body>
	<h1>Novo Cliente</h1>
	@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif

	<form action="/clientes/salvar" method="post">
		@csrf
		<p>Nome: <input type="text" name="nome" value="{{ old('nome') }}"></p>
		<p>Data de nascimento: <input type="text" name="nascimento" value="{{ old('nascimento') }}"></p>
		<p>CPF: <input type="text" name="cpf" value="{{ old('cpf') }}"></p>
		<p>E-mail: <input type="text" name="email" value="{{ old('email') }}"></p>
		<p>Telefone: <input type="text" name="fone" value="{{ old('fone') }}"></p>
		<p><input type="submit" value="Salvar"></p>
	</form>
</body>
</html>