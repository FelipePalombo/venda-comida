<?php 
//print_r($_POST);
//die;
	require_once('inc.connect.php');

	(isset($_POST['data_venda']) && !empty($_POST['data_venda'])) ?
		$data_venda = $_POST['data_venda'] : $erro = TRUE;

	(isset($_POST['valor_venda']) && !empty($_POST['valor_venda'])) ?
		$valor = $_POST['valor_venda'] : $erro = TRUE;

	(isset($_POST['cliente_venda']) && !empty($_POST['cliente_venda'])) ?
		$cliente = $_POST['cliente_venda'] : $erro = TRUE;
	
	(isset($_POST['produto']) && !empty($_POST['produto'])) ?
		$produto = $_POST['produto'] : $erro = TRUE;		
		
	(isset($_POST['quantidade_produto']) && !empty($_POST['quantidade_produto'])) ?
		$produto_qtd = $_POST['quantidade_produto'] : $erro = TRUE;	

	switch ($_POST['acao']) {
			case 'insert':
				$query = 'INSERT INTO venda(data_venda, valor, id_cliente) 
						  values ("' . $data_venda . '","' . $valor . '","' . $cliente . '")';
				mysql_query($query,$link);
				$lid = mysql_insert_id();
				echo $lid;
				$query2 = 'INSERT INTO itens_venda(id_venda, id_produto, quantidade) 
						   values (' . $lid . ',' . $produto . ',' . $produto_qtd . ')';	  
				echo $lid . ' + ' . $query2;
				mysql_query($query2,$link);
				break;

			case 'update':
				# code...
				break;

			case 'delete':
				# code...
				break;

			default:
				# code...
				break;
		}	

		mysql_close();

		header('location:index.php?pg=venda&cadastrado=true');
		exit;
?> 

