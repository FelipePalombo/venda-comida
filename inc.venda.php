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
?>

<script type="text/javascript">
	
	// for(x = 0; x < )
	// function updateValorVenda(){
	// 	var selProduto = document.getElementById('produtos').value;
	// 	var 
	// }
</script>

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
						<?php echo $options_cliente; ?>						
					</select>
				</td>
			</tr>
			<tr>
				<td>Produtos</td>
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

	<h1 class="border-top border-primary pt-4">Clientes Cadastrados</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ação</th>
				<th>Data da Venda</th>
				<th>Nome Cliente</th>
				<th>Valor</th>				
				<th>Produtos</th>
				<th>Quantidade Produto</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$query_vendas = 
			'SELECT data_venda as data, c.nome as cliente, v.valor, p.nome as produto, iv.quantidade as qtd
			   from venda as v 
			  inner join cliente as c on c.id_cliente = v.id_cliente
			  inner join itens_venda as iv on iv.id_venda = v.id_venda
			  inner join produto as p on p.id_produto = iv.id_produto';
			$res_venda = mysql_query($query_vendas,$link);
			$qtd_venda = mysql_num_rows($res_venda);
			if($qtd_venda>0){
				while($linhasv = mysql_fetch_assoc($res_venda)){
					echo '<tr>';
						echo '<td><a>Editar</a> | <a>Excluir</a></td>';
						echo '<td>' . $linhasv['data'] . '</td>';
						echo '<td>' . $linhasv['cliente'] . '</td>';
						echo '<td>' . $linhasv['valor'] . ' R$</td>';
						echo '<td>' . $linhasv['produto'] . '</td>';
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
</div>