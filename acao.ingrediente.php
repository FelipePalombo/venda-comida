<?php 
	require_once('inc.connect.php');

	(isset($_POST['nome_ingrediente']) && !empty($_POST['nome_ingrediente'])) ?
		$nome = $_POST['nome_ingrediente'] : $erro = TRUE;

	(isset($_POST['valor_ingrediente']) && !empty($_POST['valor_ingrediente'])) ?
		$valor = $_POST['valor_ingrediente'] : $erro = TRUE;

	(isset($_POST['dataFabricacao_ingrediente']) && !empty($_POST['dataFabricacao_ingrediente'])) ?
		$data_fabricacao = $_POST['dataFabricacao_ingrediente'] : $erro = TRUE;

	(isset($_POST['dataValidade_ingrediente']) && !empty($_POST['dataValidade_ingrediente'])) ?
		$data_validade = $_POST['dataValidade_ingrediente'] : $erro = TRUE;						

	switch ($_POST['acao']) {
			case 'insert':
				$query = 'INSERT INTO ingrediente(nome,valor,data_compra,data_validade) 
						  values ("' . $nome . '","' . $valor . '","' . $data_fabricacao . '","' . $data_validade . '")';
				mysql_query($query,$link) or die;		  
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
		header('location:index.php?pg=ingrediente&cadastrado=true');
?> 

