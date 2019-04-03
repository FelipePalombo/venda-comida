<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Produtos</h1>

	<form action="acao.produto.php" method="POST">
		<input type="hidden" name="acao" value="insert">
		<table class="table table-borderless">
			<tr>
				<td>Nome do Produto</td>
				<td><input type="text" name="nome_produto" size="50"></td>
			</tr>
			<tr>
				<td>Valor do Produto</td>
				<td><input type="text" name="valor_produto" size="50"></td>
			</tr>
			<tr>
				<td>Data de Fabrição</td>
				<td><input type="date" name="dataFabricacao_produto" size="50"></td>
			</tr>
			<tr>
				<td>Data de Validade</td>
				<td><input type="date" name="dataValidade_produto" size="50"></td>
			</tr>
			<!-- <tr>
				<td>Ingredientes</td>
				<td>
					<table class="table table-bordered table-sm w-25">
						<tr>
							<td>Usar</td>
							<td>Nome do Ingrediente</td>
							<td>Quantidade</td>
						</tr>
						<tr>
							<td class="w-25"><input type="checkbox" name="utilizar" class="w-100"></td>
							<td class="w-50">Tomate</td>
							<td class="w-25"><input type="number" name="quantidade" class="w-100"></td>
						</tr>
					</table>
				</td>
			</tr> -->
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
				<th>Nome do Produto</th>
				<th>Valor</th>
				<th>Data de Fabricação</th>
				<th>Data de Validade</th>
				<th>Ingredientes</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>Pizza</td>
				<td>22,0</td>
				<td>22/03/2019</td>
				<td>22/03/2020</td>
				<td>
					<ul>
						<li>Tomate</li>
						<li>Farinha</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>Pastel</td>
				<td>5,00</td>
				<td>22/03/2019</td>
				<td>22/03/2020</td>
				<td>
					<ul>
						<li>Carne</li>
						<li>Massa</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>Esfirra</td>
				<td>10,0</td>
				<td>22/03/2019</td>
				<td>22/03/2020</td>
				<td>
					<ul>
						<li>Frango</li>
						<li>Massa</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>Trufa</td>
				<td>2,00</td>
				<td>22/03/2019</td>
				<td>22/03/2020</td>
				<td>
					<ul>
						<li>Chocolate</li>
						<li>Morango</li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>

