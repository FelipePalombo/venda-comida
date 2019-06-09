<?php 
include_once('loginbarrier.php');
$mensagem = '';
if(isset($_GET['cadastrado']) && !empty($_GET['cadastrado']) && $_GET['cadastrado']){
	$mensagem = 'Cadastrado com sucesso!';
}else if(isset($_GET['excluido']) && !empty($_GET['excluido']) && $_GET['excluido']){
	$mensagem = 'Excluido com sucesso!';
}
?>

<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Ingredientes</h1>
	<h2><?php echo $mensagem; ?></h2>
	<form action="acao.ingrediente.php" method="POST">
		<input type="hidden" name="acao" value="insert">
		<table class="table table-borderless">
			<tr>
				<td>Nome do Ingrediente:</td>
				<td><input type="text" name="nome_ingrediente" size="50"></td>
			</tr>
			<tr>
				<td>Valor do Ingrediente:</td>
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
					$idq = $linhas['id_ingrediente'];
					echo '<tr>';
						echo '<td>';
							echo '<a data-toggle="modal" data-target="#modalEditar" class="editButton btn btn-light" id=' . $idq . ' onClick="transferirDadosModal(' . $idq . ')" ><i class="icon ion-md-create text-warning w-100"></i></a>  | ';
							echo '<a class="btn btn-light" href="acao.ingrediente.php?acao=delete&id_ingrediente='.$linhas['id_ingrediente'].'"><i class="icon ion-md-close text-danger w-100"></i></a>';
						echo '</td>';
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
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editando Ingrediente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="acao.ingrediente.php" method="POST">
					<div class="modal-body">			
						<input type="hidden" name="acao" value="edit">
						<input type="hidden" name="idIngrediente" id="idIngrediente_edit">						
						<div class="mb-4">
							<h4>Nome do Ingrediente</h4>
							<input type="text" name="nome_ingrediente" id="nome_ingrediente_edit" size="50">
						</div>
						<div class="mb-4">
							<h4>Valor do Ingrediente</h4>
							<input type="text" name="valor_ingrediente" id="valor_ingrediente_edit" size="50">
						</div>
						<div class="mb-4">
							<h4>Data de Fabricação</h4>
							<input type="date" name="dataFabricacao_ingrediente" id="dataFabricacao_ingrediente_edit" size="50">
						</div>
						<div class="mb-4">
							<h4>Data de Validade</h4>
							<input type="date" name="dataValidade_ingrediente" id="dataValidade_ingrediente_edit" size="50">
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
	function preencherInput(idInput, conteudo){
		document.getElementById(idInput).value = conteudo;
	}

	function preencherDadosModal(ingrediente){
		preencherInput('idIngrediente_edit',ingrediente.id);
		preencherInput('nome_ingrediente_edit',ingrediente.nome);
		preencherInput('valor_ingrediente_edit',ingrediente.valor);
		preencherInput('dataFabricacao_ingrediente_edit',ingrediente.dataFabricacao);
		preencherInput('dataValidade_ingrediente_edit',ingrediente.dataValidade);
	}

	function transferirDadosModal(id){
		var id = id;
		var idObj = document.getElementById(id).parentNode;		
		var pNome = idObj.nextSibling;
		var pValor = pNome.nextSibling;
		var pDataFabricacao = pValor.nextSibling;
		var pDataValidade = pDataFabricacao.nextSibling;
		var ingrediente = {id: id, nome: pNome.innerHTML, valor: pValor.innerHTML, 
		dataFabricacao: pDataFabricacao.innerHTML.substring(0,10), dataValidade: pDataValidade.innerHTML.substring(0,10)};

		preencherDadosModal(ingrediente);		
	}								
</script>