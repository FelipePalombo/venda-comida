<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Venda</h1>

	<form action="acao.venda.php" method="POST">
		<input type="hidden" name="acao" value="insert">
		<table class="table table-borderless">
			<tr>
				<td>Data da Venda</td>
				<td><input type="date" name="data_venda" size="50"></td>
			</tr>
			<tr>
				<td>Valor da Venda</td>
				<td><input type="number" name="valor_venda" size="50"></td>
			</tr>
			<tr>
				<td>Cliente</td>
				<td>
					<select name="cliente_venda" size="3">
						<option value="1">Felipe</option>
						<option value="2">Joao</option>
						<option value="3">Andre</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Produtos</td>
				<td>
					<select name="produto" size="3">
						<option value="1">Pizza</option>
						<option value="2">Esfirra</option>
						<option value="3">Doce</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Quantidade</td>
				<td><input type="number" name="quantidade_produto" size="10"></td>
			</tr>
			<tr align="center">
				<td colspan="2" class="p-3"><input type="submit" name="botao" value="Enviar"></td>
			</tr>
		</table>
	</form>

	<h1 class="border-top border-primary pt-4">Clientes Cadastrados</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ação</th>
				<th>Data da Venda</th>
				<th>Nome Cliente</th>
				<th>Valor</th>				
				<th>Produtos</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>27/05/2019</td>
				<td>Joao Legal</td>
				<td>30,00</td>
				<td>
					<ul>
						<li>Pizza</li>
						<li>Pastel</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>27/05/2019</td>
				<td>Felipe Massa</td>
				<td>20,00</td>
				<td>
					<ul>
						<li>Trufa</li>
						<li>Pizza</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>27/05/2019</td>
				<td>Antonio Setim</td>
				<td>14,00/td>
				<td>
					<ul>
						<li>Pastel</li>
						<li>Esfirra</li>
					</ul>
				</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>27/05/2019</td>
				<td>Marcus do Jaff</td>
				<td>100,00</td>
				<td>
					<ul>
						<li>Nhoque</li>
						<li>Ovo de Páscoa</li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
</div>