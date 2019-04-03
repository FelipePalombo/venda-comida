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
		
	// (isset($_POST['dataValidade_produto']) && !empty($_POST['dataValidade_produto'])) ?
	// 	$ingredientes[] = $_POST['dataValidade_produto'] : $erro = TRUE;				

	switch ($_POST['acao']) {
			case 'insert':
				$query = 'INSERT INTO produto(nome,valor,data_feito,data_validade) 
						  values ("' . $nome . '","' . $valor . '","' . $data_fabricacao . '","' . $data_validade . '")';
				mysql_query($query,$link);		  
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

