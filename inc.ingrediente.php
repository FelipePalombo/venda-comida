<?php 
$cadastrado = '';
if(isset($_GET['cadastrado']) && !empty($_GET['cadastrado'])){
	if($_GET['cadastrado'])
		$cadastrado = 'Cadastrado com sucesso!';
}
?>

<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Ingredientes</h1>
	<h2><?php echo $cadastrado; ?></h2>
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
		<?php
			$query = 'SELECT * from ingrediente';
			$res = mysql_query($query);
			$qtd = mysql_num_rows($res);
			if($qtd > 0){
				while($linhas = mysql_fetch_assoc($res)){
					echo '<tr>';
						echo '<td><a>Editar</a> | <a>Excluir</a></td>';
						echo '<td>' . $linhas['nome'] . '</td>';
						echo '<td>' . $linhas['valor'] . '</td>';
						echo '<td>' . $linhas['data_compra'] . '</td>';
						echo '<td>' . $linhas['data_validade'] . '</td>';
					echo '</tr>';
				}			
			}else{
				echo '<h3 class="m-3">Sem registros a serem listados!</h3>';
			}

		?>	
		</tbody>
	</table>
</div>