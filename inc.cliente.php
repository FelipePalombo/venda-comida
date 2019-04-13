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

	<table class="table table-striped mb-4">
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
		<?php 
			$query = 'SELECT * from cliente';
			$res = mysql_query($query,$link);
			//echo $res;
			
			$qtd = mysql_num_rows($res);

			if($qtd > 0){
				while($linha = mysql_fetch_assoc($res)){
					echo '<tr>';
						echo '<td><a>Editar</a> | <a>Excluir</a></td>';
						echo '<td>' . $linha['cpf'] . '</td>';
						echo '<td>' . $linha['nome'] .'</td>';
						echo '<td>' . $linha['endereco'] .'</td>';
						echo '<td>' . $linha['telefone'] . '</td>';
					echo '</tr>';
				}
			}else{
				echo 'Sem registros a serem listados!';
			}
		?>		
		</tbody>
	</table>
</div>	