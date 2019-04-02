<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Cliente</h1>
	<form action="acao.clientes.php" method="POST">
		<input type="hidden" name="acao" value="insert">
		<table class="table table-borderless">
			<tr>
				<td>Nome do Cliente:</td>
				<td><input type="text" name="nome_cliente" size="50"></td>
			</tr>
			<tr>
				<td>CPF:</td>
				<td><input type="text" name="cpf_cliente" size="50"></td>
			</tr>
			<tr>
				<td>Endereço:</td>
				<td><input type="text" name="endereco_cliente" size="50"></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone_cliente" size="50"></td>
			</tr>
			<tr align="center">
				<td colspan="2" class="p-3"><input type="submit" name="botao" value="Enviar"></td>
			</tr>
		</table>
	</form>
	<br>

	<h1 class="border-top border-primary pt-4">Clientes Cadastrados</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ação</th>
				<th>CPF</th>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Telefone</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>01122244435</td>
				<td>Joao Legal</td>
				<td>Rua São Paulo</td>
				<td>51 99221-1111</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>08125244571</td>
				<td>Felipe Massa</td>
				<td>Rua Macieira do Céu</td>
				<td>51 98231-1111</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>05225246571</td>
				<td>Antonio Setim</td>
				<td>Rua Dificil de Pensa</td>
				<td>51 98364-1111</td>
			</tr>
			<tr>
				<td><a>Editar</a> | <a>Excluir</a></td>
				<td>05126814571</td>
				<td>Marcus do Jaff</td>
				<td>Rua Larazio Santos</td>
				<td>51 98231-1111</td>
			</tr>
		</tbody>
	</table>
</div>