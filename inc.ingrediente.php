<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Ingredientes</h1>

	<form action="acao.ingrediente.php" method="POST">
		<input type="hidden" name="acao" value="insert">
		<table class="table table-borderless">
			<tr>
				<td>Nome do Ingrediente:</td>
				<td><input type="text" name="nome_ingrediente" size="50"></td>
			</tr>
			<tr>
				<td>Valor do Produto:</td>
				<td><input type="text" name="valor_ingrediente" size="50"></td>
			</tr>
			<tr>
				<td>Data de Fabrição:</td>
				<td><input type="date" name="dataFabricacao_ingrediente" size="50"></td>
			</tr>
			<tr>
				<td>Data de Validade:</td>
				<td><input type="date" name="dataValidade_ingrediente" size="50"></td>
			</tr>
			<tr align="center">
				<td colspan='2' class="p-3"><input type="submit" name="botao" value="Enviar"></td>
			</tr>
		</table>
	</form>

	<h1 class="border-top border-primary pt-4">Ingredientes Cadastrados</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ação</th>
				<th>Nome do Ingrediente</th>
				<th>Valor</th>
				<th>Data de Fabricação</th>
				<th>Data de Validade</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>Tomate</td>
				<td>22,0</td>
				<td>22/03/2019</td>
				<td>22/03/2020</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>Queijo</td>
				<td>5,00</td>
				<td>22/03/2019</td>
				<td>22/03/2020</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>Carne</td>
				<td>10,0</td>
				<td>22/03/2019</td>
				<td>22/03/2020</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>Calabresa</td>
				<td>2,00</td>
				<td>22/03/2019</td>
				<td>22/03/2020</td>
			</tr>
		</tbody>
	</table>
</div>