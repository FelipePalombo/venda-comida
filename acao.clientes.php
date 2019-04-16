<?php 
//print_r($_POST);
//die;
	require_once('inc.connect.php');

	(isset($_POST['nome_cliente']) && !empty($_POST['nome_cliente'])) ?
		$nome = $_POST['nome_cliente'] : $erro = TRUE;

	(isset($_POST['cpf_cliente']) && !empty($_POST['cpf_cliente'])) ?
		$cpf = $_POST['cpf_cliente'] : $erro = TRUE;

	(isset($_POST['endereco_cliente']) && !empty($_POST['endereco_cliente'])) ?
		$endereco = $_POST['endereco_cliente'] : $erro = TRUE;

	(isset($_POST['telefone_cliente']) && !empty($_POST['telefone_cliente'])) ?
		$telefone = $_POST['telefone_cliente'] : $erro = TRUE;						

	switch ($_POST['acao']) {
			case 'insert':
				$query = 'INSERT INTO cliente(nome,cpf,endereco,telefone) 
						  values ("' . $nome . '","' . $cpf . '","' . $endereco . '","' . $telefone . '")';
				// echo $link;
				// echo $query;
				mysql_query($query,$link) or die(mysql_error());	
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
		// mysql_close();

		header('location:index.php?pg=cliente&cadastrado=true');
		exit;
?> 

