<?php 
//print_r($_POST);
//die;
	require_once('inc.connect.php');

	(isset($_POST['nome_produto']) && !empty($_POST['nome_produto'])) ?
		$nome = $_POST['nome_produto'] : $erro = TRUE;

	(isset($_POST['valor_produto']) && !empty($_POST['valor_produto'])) ?
		$valor = $_POST['valor_produto'] : $erro = TRUE;

	(isset($_POST['dataFabricacao_produto']) && !empty($_POST['dataFabricacao_produto'])) ?
		$data_fabricacao = $_POST['dataFabricacao_produto'] : $erro = TRUE;

	(isset($_POST['dataValidade_produto']) && !empty($_POST['dataValidade_produto'])) ?
		$data_validade = $_POST['dataValidade_produto'] : $erro = TRUE;		
		
	(isset($_POST['ingrediente']) && !empty($_POST['ingrediente'])) ?
		$ingrediente = $_POST['ingrediente'] : $erro = TRUE;
	
	(isset($_POST['ingrediente_qtd']) && !empty($_POST['ingrediente_qtd'])) ?
		$ingrediente_qtd = $_POST['ingrediente_qtd'] : $erro = TRUE;

	switch ($_POST['acao']) {
			case 'insert':
				$query = 'INSERT INTO produto(nome,valor,data_feito,data_validade) 
						  values ("' . $nome . '","' . $valor . '","' . $data_fabricacao . '","' . $data_validade . '")';
				mysql_query($query,$link);
				$lid = mysql_insert_id();
				echo $lid;
				$query2 = 'INSERT INTO ingredientes_produto(id_produto, id_ingrediente, quantidade) 
						   values (' . $lid . ',' . $produto . ',' . $ingrediente_qtd . ')';	  
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
?> 

