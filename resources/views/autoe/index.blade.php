<DOCTYPE html>

<html>
	<head>
		<title>Auto Escola</title>
	</head>
	<body>
		<h1>Cadastro de Carros</h1>
		<form action="/autoe" method="POST">
			<div>
				<label>Marca</label>
				<input type="text" name="marca" value="{{ $autoe->marca }}"/>
			</div>
			<div>
				<label>Modelo</label>
				<input type="text" name="modelo" value="{{ $autoe->modelo }}"/>
			</div>
			<div>
				<label>Placa</label>
				<input type="text" name="placa" value="{{ $autoe->placa }}"/>
			</div>
			<div>
				<label>Cor</label>
				<input type="text" name="cor" value="{{ $autoe->cor }}"/>
			</div>
			<div>
				<label>Ano</label>
				<input type="text" name="ano" value="{{ $autoe->ano }}"/>
			</div>
			<div>
			@csrf
				<input type="hidden" name="id" value="{{ $autoe->id }}"/>
				<button type="submit">Salvar</button>
				<a href="/autoe">Novo</a>
			</div>
			<br/>
			<table>
				<thead>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Placa</th>
					<th>Cor</th>
					<th>Ano</th>
					<th>Editar</th>
					<th>Excluir</th>
				</thead>
				<tbody>
					@foreach ($autoes as $autoe)
						<tr>
							<td>{{ $autoe->marca }}</td>
							<td>{{ $autoe->modelo }}</td>
							<td>{{ $autoe->placa }}</td>
							<td>{{ $autoe->cor }}</td>
							<td>{{ $autoe->ano }}</td>
							<td>
								<a href="/autoe/{{ $autoe->id }}/edit">Editar</a>
							</td>
							<td>
								<form action="/autoe/{{ $autoe->id }}" method="POST">
									@csrf
									<input type="hidden" name="_method" value="delete"/>
									<button type="submit">Excluir</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</form>
	</body>
</html>