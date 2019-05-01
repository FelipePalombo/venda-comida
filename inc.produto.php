<?php 
	$query = 'SELECT * from ingrediente';
	$res = mysql_query($query,$link);
	//echo $res;
	//echo $res;
	$qtd = mysql_num_rows($res);
	$c = 0;
	$options[0] = 'inicio';
	if($qtd > 0){
		while($linha = mysql_fetch_assoc($res)){
			$c += 1;
			$options[$c] = '<option value="' . $linha['id_ingrediente'] . '">' . $linha['nome'] . '</option>';
		}
	}
	$options2 = '';
	for($x = 1; $x <= $qtd; $x++ ) 			
		$options2 = $options2 . $options[$x];

	$mensagem = '';
	if(isset($_GET['cadastrado']) && !empty($_GET['cadastrado']) && $_GET['cadastrado']){
		$mensagem = 'Cadastrado com sucesso!';
	
	}else if(isset($_GET['excluido']) && !empty($_GET['excluido']) && $_GET['excluido']){
		$mensagem = 'Excluido com sucesso!';
	}
?>

<script type="text/javascript">
	function criaNovoIngrediente(idI){
		//console.log(idI);		
		var novo_idI = idI + 1;
		//console.log(novo_idI);	
		var quantidade_ing = document.getElementById('quantidade_ingredientes');
		//console.log(`Quantidade da variavel: ${quantidade_ing.value}`);
		//console.log(`Quantidade da hiddeninput: ${document.getElementById('quantidade_ingredientes').value}`);
		quantidade_ing.value = parseInt(quantidade_ing.value) + 1;
		//console.log(`Quantidade da variavel: ${quantidade_ing.value}`);
		//console.log(`Quantidade da hiddeninput: ${document.getElementById('quantidade_ingredientes').value}`);

		var table = document.getElementById('table_ingredientes');
		var row = table.insertRow(1);
		var ingrediente = row.insertCell(0);
		var quantidade = row.insertCell(1);
		var adicionar = row.insertCell(2);

		ingrediente.innerHTML = `<td class="w-50"><select name="ingrediente_${novo_idI}"/><?php echo $options2; ?></select></td>`;
		quantidade.innerHTML = `<td class="w-25"><input type="number" name="quantidade_${novo_idI}" class="w-100"></td>`;
		adicionar.innerHTML = '<td class="w-25 justify-content-center"><a class="btn btn-info" onClick="criaNovoIngrediente('+novo_idI+')">+</a></td>';								   
	}								
</script>

<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Produtos</h1>
	<h2><?php echo $mensagem; ?></h2>	
	<form action="acao.produto.php" method="POST">
		<input type="hidden" name="acao" value="insert">
		<input type="hidden" name="quantidade_ingredientes" id="quantidade_ingredientes" value="1">
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
			<tr>
				<td>Ingredientes</td>
				<td>
					<table class="table table-bordeless table-sm w-25" id="table_ingredientes">
						<thead>
							<tr>
								<th>Ingrediente</th>
								<th>Quantidade</th>
								<th>Adicionar</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="w-50">
									<select name="ingrediente_1" width="100%">
									<?php
										//  for($x = 1; $x <= $qtd; $x++ ) 			
										//  	echo $options[$x];
										echo $options2;
									?>
									</select>
								</td>
								<td class="w-25">
									<input type="number" name="quantidade_1" class="w-100">
								</td>
								<td class="w-25 justify-content-center">
									<a class='btn btn-info' onClick="criaNovoIngrediente(1)">+</a>									
								</td>
							</tr>	
						</tbody>
					</table>			
				</td>
			<tr align="center">
				<td colspan='2' class="p-3"><input type="submit" name="botao" value="Enviar"></td>
			</tr>
		</table>
	</form>


	<h1 class="border-top border-primary pt-4">Produtos Cadastrados</h1>

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
			<?php
			$query = 'SELECT * from produto';			
			$res = mysql_query($query,$link);
			
			//echo $res;
			$qtd = mysql_num_rows($res);

			if($qtd > 0){
				while($linha = mysql_fetch_assoc($res)){
					echo '<tr>';
						echo '<td><a href="acao.produto.php?acao=editar">Editar</a>  | ';
						echo '<a href="acao.produto.php?acao=delete&id_produto='.$linha['id_produto'].'">Excluir</a></td>';
						echo '<td>' . $linha['nome'] . '</td>';
						echo '<td>' . $linha['valor'] .' U$</td>';
						echo '<td>' . $linha['data_feito'] .'</td>';
						echo '<td>' . $linha['data_validade'] . '</td>';
						
						$query2 = 'SELECT nome FROM ingredientes_produto as igp
						inner join ingrediente as i on i.id_ingrediente = igp.id_ingrediente 
						where igp.id_produto = ' . $linha['id_produto'];
						
						$res2 = mysql_query($query2,$link) or die(mysql_error());
					
						$qtd2 = mysql_num_rows($res2) or die(mysql_error());
						
						if($qtd2 > 0){							
								echo '<td>';
									echo '<ul>';
									while($linha2 = mysql_fetch_assoc($res2)){
										echo '<li>' . $linha2['nome'] . '</li>';
									}
									echo '</ul>';
								echo '</td>';							
						}
					echo '</tr>';
				}
			}else{
				echo 'Sem registros a serem listados!';
			}
			?>			
		</tbody>
	</table>
</div>

