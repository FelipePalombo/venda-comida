<?php 
	$query = 'SELECT * from ingrediente';
	$res = mysql_query($query,$link);
	$qtd = mysql_num_rows($res);
	$c = 0;
	$options[0] = 'inicio';
	// Pegando os ingredientes do banco
	if($qtd > 0){
		while($linha = mysql_fetch_assoc($res)){
			$c += 1;
			$options[$c] = '<option value="' . $linha['id_ingrediente'] . '">' . $linha['nome'] . '</option>';
		}
	}

	// Populando tudo numa string só
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
		var novo_idI = idI + 1;
		
		var quantidade_ing = document.getElementById('quantidade_ingredientes');
		
		quantidade_ing.value = parseInt(quantidade_ing.value) + 1;

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
										<?php echo $options2; ?>
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
				$idq = 0;
				while($linha = mysql_fetch_assoc($res)){
					$idq = $linha['id_produto'];
					echo '<tr>';
						echo '<td>';
							echo '<a data-toggle="modal" data-target="#modalEditar" class="editButton btn btn-light" id=' . $idq . ' onClick="transferirDadosModal(' . $idq . ')" ><i class="icon ion-md-create text-warning w-100"></i></a>  | ';
							echo '<a class="btn btn-light"  href="acao.produto.php?acao=delete&id_produto='.$linha['id_produto'].'"><i class="icon ion-md-close text-danger w-100"></i></a>';
						echo '</td>';
						echo '<td>' . $linha['nome'] . '</td>';
						echo '<td>' . $linha['valor'] .'</td>';
						echo '<td>' . $linha['data_feito'] .'</td>';
						echo '<td>' . $linha['data_validade'] . '</td>';
						
						$query2 = 'SELECT igp.id_ingrediente as idi, nome, igp.quantidade as quantidade FROM ingredientes_produto as igp
						inner join ingrediente as i on i.id_ingrediente = igp.id_ingrediente 
						where igp.id_produto = ' . $linha['id_produto'];
						
						$res2 = mysql_query($query2,$link) or die(mysql_error());
					
						$qtd2 = mysql_num_rows($res2) or die(mysql_error());
						
						if($qtd2 > 0){							
								echo '<td>';
									echo '<ul id="test">';
									while($linha2 = mysql_fetch_assoc($res2)){
										echo '<li><nomeIngrediente idi='.$linha2['idi'].'>' . $linha2['nome'] . '</nomeIngrediente> (<quantidade>' . $linha2['quantidade'] . '</quantidade>)</li>';
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
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editando Produto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="acao.produto.php" method="POST">
					<div class="modal-body">			
						<input type="hidden" name="acao" value="edit">
						<input type="hidden" name="idProduto" id="idProduto_edit">
						<input type="hidden" name="quantidade_ingredientes_edit" id="quantidade_ingredientes_edit" value="1">											
						<div class="mb-4">
							<h4>Nome do Produto</h4>
							<input type="text" name="nome_produto" id="nome_produto_edit" size="50">
						</div>
						<div class="mb-4">
							<h4>Valor do Produto</h4>
							<input type="text" name="valor_produto" id="valor_produto_edit" size="10">
						</div>
						<div class="mb-4">
							<h4>Data de Fabrição</h4>
							<input type="date" name="dataFabricacao_produto" id="dataFabricacao_produto_edit" size="50">
						</div>
						<div class="mb-4">
							<h4>Data de Validade</h4>
							<input type="date" name="dataValidade_produto" id="dataValidade_produto_edit" size="50">
						</div>
						<div>							
							<h4>Ingredientes</h4>
							<table class="table table-bordeless table-sm w-25" id="table_ingredientes_editar">
								<thead>
									<tr>
										<th>Ingrediente</th>
										<th>Quantidade</th>								
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>	
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary" name="botao" value="Enviar">Alterar</button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function optionSelecionadaPorId(ingredienteHTML, ingrediente){
		var options = ingredienteHTML.firstChild;		
		for(i = 0; i < options.length; i++){
			if(options[i].value == ingrediente.idIngrediente){
				options[i].setAttribute('selected',true);
			}
		}
		// console.log(`ingrediente na optionSelecionadaPorId: ${options}`);
	}

	function preencherIngredientesEditar(ingredientes){
		var table = document.getElementById('table_ingredientes_editar');
		if(table.rows.length > 1){
			for(i = table.rows.length-1; i > 0; i--){
				table.deleteRow(i);
			}
		}

		ingredientes.forEach(function(value,index){
			var row = table.insertRow(1);
			var ingrediente = row.insertCell(0);
			var quantidade = row.insertCell(1);

			ingrediente.innerHTML = `<select name="ingrediente_${index+1}"><?php echo $options2; ?></select>`;			
			optionSelecionadaPorId(ingrediente,value);
			quantidade.innerHTML = `<input value=${value.quantidadeIngrediente} name="quantidade_${index+1}" size="5">`;
		});
	}

	function preencherInput(idInput, conteudo){
		document.getElementById(idInput).value = conteudo;
	}

	function preencherDadosModal(produto){
		preencherInput('idProduto_edit',produto.id);
		preencherInput('nome_produto_edit',produto.nome);
		preencherInput('valor_produto_edit',produto.valor);
		preencherInput('dataFabricacao_produto_edit',produto.dataFabricacao);
		preencherInput('dataValidade_produto_edit',produto.dataValidade);
		preencherIngredientesEditar(produto.ingredientes);
	}

	function transformaListaEmArray(ul){
		var qtd = ul.childElementCount;
		var ulC = ul.children;
		
		var arrayIngredientes = [];
		for(i = 0; i < ulC.length; i++){
			var nome = ulC[i].firstChild;
			var idi = nome.getAttribute('idi');
			// console.log(idi);
			var qtd =  nome.nextElementSibling;	
			
			arrayIngredientes.push({idIngrediente: idi, nomeIngrediente: nome.innerHTML, quantidadeIngrediente: qtd.innerHTML});
		}
		console.log(arrayIngredientes);
		return arrayIngredientes;
	}	

	function transferirDadosModal(id){
		var id = id;
		var idObj = document.getElementById(id).parentNode;		
		var pNome = idObj.nextSibling;
		var pValor = pNome.nextSibling;
		var pDataFabricacao = pValor.nextSibling;
		var pDataValidade = pDataFabricacao.nextSibling;
		var objLista = pDataValidade.nextSibling.firstChild;
		var pIngredientes = transformaListaEmArray(objLista);
		var produto = {id: id, nome: pNome.innerHTML, valor: pValor.innerHTML, dataFabricacao: pDataFabricacao.innerHTML.substring(0,10),
		dataValidade: pDataValidade.innerHTML.substring(0,10), ingredientes: pIngredientes};
		
		// console.log(`quantidade_ingredientes: ${produto.ingredientes.length}`);
		document.getElementById('quantidade_ingredientes_edit').value = produto.ingredientes.length;
		// 
		preencherDadosModal(produto);		
	}								
</script>