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
	echo $qtd;
?>

<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Produtos</h1>

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
				<td>Ingrediente</td>
				<td>
					<select name="ingrediente" size="3">
						<option value="1">Massa</option>
						<option value="2">Açucar</option>
						<option value="3">Tomate</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Quantidade</td>
				<td><input type="number" name="ingrediente_qtd" size="10"></td>
			</tr>
			<tr>
				<td>Ingredientes teste</td>
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
									<select name="ingredientes_teste" width="100%">
									<?php
										for($x = 1; $x <= $qtd; $x++ ) 			
											echo $options[$x];
									?>
									</select>
								</td>
								<td class="w-25">
									<input type="number" name="quantidade" class="w-100">
								</td>
								<td class="w-25 justify-content-center">
									<a class='btn btn-info' onClick='criaNovoIngrediente(1)'>+</a>
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

		ingrediente.innerHTML = `<td class="w-50"><select name="ingredientes_teste_${novo_idI}"/><?php for($x = 1; $x <= $qtd; $x++ ) echo $options[$x]; ?></select></td>`;
		quantidade.innerHTML = `<td class="w-25"><input type="number" name="quantidade_${novo_idI}" class="w-100"></td>`;
		adicionar.innerHTML = '<td class="w-25 justify-content-center"><a class="btn btn-info" onClick="criaNovoIngrediente('+novo_idI+')">+</a></td>';								   
	}								
</script>