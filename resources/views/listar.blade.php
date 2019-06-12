<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Clientes</title>
</head>
<body>
	<h1>Listagem de Clientes</h1>
	@if (session('mensagem'))
		<h2>{{ session('mensagem') }}</h2>
	@endif
	<a href="/clientes/novo">Novo Cliente</a>
	<table>
	    <thead>
	        <th>Código</th>
	        <th>Nome</th>
	        <th>Opções</th>
	    </thead>
	    <tbody>
	        @foreach ($clientes as $cliente)
	        <tr>
	            <td>{{ $cliente->codigo }}</td>
	            <td>{{ $cliente->nome }}</td>
	            <td>
	            	<a href="/clientes/{{ $cliente->codigo }}">Visualizar</a>
	            	<a href="/clientes/editar/{{ $cliente->codigo }}">Editar</a>
	            	<a href="/clientes/excluir/{{ $cliente->codigo }}">Excluir</a>
            	</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>

</body>
</html>