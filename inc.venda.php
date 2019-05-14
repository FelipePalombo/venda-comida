<?php 
	$query = 'SELECT * from cliente';
	$query2 = 'SELECT * from produto';
	$res = mysql_query($query,$link);
	$res2 = mysql_query($query2,$link);
	//echo $res;
	//echo $res;
	$qtd = mysql_num_rows($res);
	$qtd2 = mysql_num_rows($res);
	// $c = 0;
	$options_cliente = '';
	$options_produto = '';
	if($qtd > 0){
		while($linha = mysql_fetch_assoc($res)){
			// $c += 1;
			$options_cliente = $options_cliente . '<option value="' . $linha['id_cliente'] . '">' . $linha['nome'] . '</option>';
		}
	}
	// $c = 0;
	// $valor_produto[0] = 0;
	if($qtd2 > 0){
		while($linha2 = mysql_fetch_assoc($res2)){
			//$c += 1;
			$options_produto = $options_produto . '<option value="' . $linha2['id_produto'] . '">' . $linha2['nome'] . '</option>';
			//$valor_produto[$linha2['id_produto']] = $linha2['valor'];			
		}
	}
	
	$mensagem = '';
	if(isset($_GET['cadastrado']) && !empty($_GET['cadastrado']) && $_GET['cadastrado']){
		$mensagem = 'Cadastrado com sucesso!';
	
	}else if(isset($_GET['excluido']) && !empty($_GET['excluido']) && $_GET['excluido']){
		$mensagem = 'Excluido com sucesso!';
	}	
?>

<script type="text/javascript">
	
	// for(x = 0; x < )
	// function updateValorVenda(){
	// 	var selProduto = document.getElementById('produtos').value;
	// 	var 
	// }
	// SERÁ IMPLEMENTADO VALOR DA VENDA BASEADO NO VALOR DO PRODUTO 
</script>

<div class="container d-flex flex-column no-gutters">
	<h1>Cadastrar Venda</h1>
	<h2><?php echo $mensagem; ?></h2>	
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
						<?php echo $options_cliente; ?>						
					</select>
				</td>
			</tr>
			<tr>
				<td>Produto</td>
				<td>
					<select name="produto" size="3" id="produtos">
						<?php echo $options_produto; ?>
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

	<h1 class="border-top border-primary pt-4">Vendas Cadastradas</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ação</th>
				<th>Data da Venda</th>
				<th>Nome Cliente</th>
				<th>Valor</th>				
				<th>Produto</th>
				<th>Quantidade Produto</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query_vendas = 
			'SELECT v.id_venda as idvenda, data_venda as data, v.id_cliente as idc, c.nome as cliente, v.valor, iv.id_produto as idp, p.nome as produto, iv.quantidade as qtd
			   from venda as v 
			  inner join cliente as c on c.id_cliente = v.id_cliente
			  inner join itens_venda as iv on iv.id_venda = v.id_venda
			  inner join produto as p on p.id_produto = iv.id_produto';
			$res_venda = mysql_query($query_vendas,$link);
			$qtd_venda = mysql_num_rows($res_venda);
			if($qtd_venda>0){
				while($linhasv = mysql_fetch_assoc($res_venda)){
					$idq = $linhasv['idvenda'];
					echo '<tr>';
						echo '<td>';
							echo '<a data-toggle="modal" data-target="#modalEditar" class="editButton btn btn-light" id=' . $idq . ' onClick="transferirDadosModal(' . $idq . ')" ><i class="icon ion-md-create text-warning w-100"></i></a>  | ';
							echo '<a class="btn btn-light" href="acao.venda.php?acao=delete&id_venda='.$linhasv['idvenda'].'"><i class="icon ion-md-close text-danger w-100"></i></a>';
						echo '</td>';
						echo '<td>' . $linhasv['data'] . '</td>';
						echo '<td idc='. $linhasv['idc'] .'>' . $linhasv['cliente'] . '</td>';
						echo '<td>' . $linhasv['valor'] . '</td>';
						echo '<td idp='. $linhasv['idp'] .'>' . $linhasv['produto'] . '</td>';
						echo '<td>' . $linhasv['qtd'] . '</td>';
					echo '</tr>';
				}	
			}else{
				echo 'Sem registros a serem listados!';
			}
		?>	
			</tr>
		</tbody>
	</table>
	<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Editando Venda</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="acao.venda.php" method="POST">
					<div class="modal-body">			
						<input type="hidden" name="acao" value="edit">
						<input type="hidden" name="idVenda" id="idVenda_edit">
						
						<div class="mb-4">
							<h4>Data da Venda</h4>
							<input type="date" name="data_venda" size="50" id="dataVenda_venda_edit">
						</div>
						<div class="mb-4">
							<h4>Valor da Venda</h4>
							<input type="number" name="valor_venda" id="valor_venda_edit" size="10">
						</div>
						<div class="mb-4">
							<h4>Cliente</h4>
							<select name="cliente_venda" size="3" id="cliente_venda_edit">
								<?php echo $options_cliente; ?>						
							</select>
						</div>
						<div class="mb-4">
							<h4>Produto</h4>
							<select name="produto" size="3" id="produto_venda_edit">
								<?php echo $options_produto; ?>
							</select>							
						</div>
						<div class="mb-4">							
							<h4>Quantidade</h4>
							<input type="number" name="quantidade_produto" id="quantidade_venda_edit" size="3">
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
	function optionSelecionadaPorId(select, id){
		var options = select;		
		for(i = 0; i < options.length; i++){
			if(options[i].value == id){
				options[i].setAttribute('selected',true);
			}
		}
	}

	function preencherInput(idInput, conteudo){
		document.getElementById(idInput).value = conteudo;
	}

	function preencherDadosModal(venda){
		preencherInput('idVenda_edit',venda.id);
		preencherInput('valor_venda_edit',venda.valor);
		preencherInput('dataVenda_venda_edit',venda.data_venda);
		preencherInput('quantidade_venda_edit',venda.quantidade);
		var cliente = document.getElementById('cliente_venda_edit');
		optionSelecionadaPorId(cliente,venda.cliente);
		var produto = document.getElementById('produto_venda_edit');
		optionSelecionadaPorId(produto,venda.produto);
	}

	function transferirDadosModal(id){
		var id = id;
		var idObj = document.getElementById(id).parentNode;		
		var pData = idObj.nextSibling;
		var pCliente = pData.nextSibling;
		var pValor = pCliente.nextSibling;		
		var pProduto = pValor.nextSibling;
		var pQuantidade = pProduto.nextSibling;
		pCliente = pCliente.getAttribute('idc');
		pProduto = pProduto.getAttribute('idp');
		// debugger;
		var venda = {id: id, data_venda: pData.innerHTML.substring(0,10), valor: parseInt(pValor.innerHTML), 
		cliente: pCliente, produto: pProduto, quantidade: pQuantidade.innerHTML};
		
		preencherDadosModal(venda);		
	}								
</script>