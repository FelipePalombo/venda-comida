<?php 
include_once('loginbarrier.php');
$mensagem = 'Operação realizada com sucesso!';
if(isset($_GET['cadastrado']) && !empty($_GET['cadastrado']) && $_GET['cadastrado']){
	$mensagem = 'Cadastrado com sucesso!';

}else if(isset($_GET['excluido']) && !empty($_GET['excluido']) && $_GET['excluido']){
	$mensagem = 'Excluido com sucesso!';
}
?>

<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Cliente</h1>
	<h2><?php echo $mensagem; ?></h2>
	<form action="acao.clientes.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="acao" value="insert">
		<table class="table table-borderless">
			<tr>
				<td>Imagem do Cliente</td>
				<td><input type="file" name="arquivo"></td>
			</tr>
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
				<th>Imagem</th>
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
					$idq = $linha['id_cliente'];
					echo '<tr>';						
						echo '<td>';
							echo '<a data-toggle="modal" data-target="#modalEditar" class="editButton btn btn-light" id=' . $idq . ' onClick="transferirDadosModal(' . $idq . ')" ><i class="icon ion-md-create text-warning w-100"></i></a>  | ';
							echo '<a class="btn btn-light" href="acao.clientes.php?acao=delete&id_cliente='.$linha['id_cliente'].'"><i class="icon ion-md-close text-danger w-100"></i></a>';
						echo '</td>';
						echo '<td><img src="' . $linha['cliente_caminho_img'] . '" alt="Imagem do cliente." width=60 height=60></td>';
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
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editando Cliente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="acao.clientes.php" method="POST" enctype="multipart/form-data">
					<div class="modal-body">			
						<input type="hidden" name="acao" value="edit">
						<input type="hidden" name="idCliente" id="idCliente_edit">
						<div class="mb-4">
							<h4>Imagem do Cliente</h4>
							<img src="" alt="Imagem do cliente." id="imagem_cliente_edit" width=60 height=60>
							<input type="file" name="arquivo">
						</div>						
						<div class="mb-4">
							<h4>Nome do Cliente</h4>
							<input type="text" name="nome_cliente" id="nome_cliente_edit" size="50">
						</div>
						<div class="mb-4">
							<h4>CPF</h4>
							<input type="text" name="cpf_cliente" id="cpf_cliente_edit" size="50">
						</div>
						<div class="mb-4">
							<h4>Endereço</h4>
							<input type="text" name="endereco_cliente" id="endereco_cliente_edit" size="50">
						</div>
						<div class="mb-4">
							<h4>Telefone</h4>
							<input type="text" name="telefone_cliente" id="telefone_cliente_edit" size="50">
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

	function preencherDadosModal(cliente){
		preencherInput('idCliente_edit',cliente.id);
		preencherInput('nome_cliente_edit',cliente.nome);
		preencherInput('cpf_cliente_edit',cliente.cpf);
		preencherInput('endereco_cliente_edit',cliente.endereco);
		preencherInput('telefone_cliente_edit',cliente.telefone);
		console.log(cliente.imagem);
		document.getElementById("imagem_cliente_edit").setAttribute('src',cliente.imagem);
	}

	function transferirDadosModal(id){
		var id = id;
		var idObj = document.getElementById(id).parentNode;
		var pImg = idObj.nextSibling;		
		var pCPF = pImg.nextSibling;
		var pNome = pCPF.nextSibling;
		var pEndereco = pNome.nextSibling;
		var pTelefone = pEndereco.nextSibling;
		var cliente = {id: id, imagem: pImg.firstChild.getAttribute('src'), nome: pNome.innerHTML, cpf: pCPF.innerHTML, endereco: pEndereco.innerHTML, telefone: pTelefone.innerHTML};

		preencherDadosModal(cliente);		
	}								
</script>