<?php 
//print_r($_POST);
//die;
	require_once('inc.connect.php');
	$excluido = false;
	$cadastrado = false;
	(isset($_POST['idCliente']) && !empty($_POST['idCliente'])) ?
		$idCliente = $_POST['idCliente'] : $erro = TRUE;

	(isset($_POST['nome_cliente']) && !empty($_POST['nome_cliente'])) ?
		$nome = $_POST['nome_cliente'] : $erro = TRUE;

	(isset($_POST['cpf_cliente']) && !empty($_POST['cpf_cliente'])) ?
		$cpf = $_POST['cpf_cliente'] : $erro = TRUE;

	(isset($_POST['endereco_cliente']) && !empty($_POST['endereco_cliente'])) ?
		$endereco = $_POST['endereco_cliente'] : $erro = TRUE;

	(isset($_POST['telefone_cliente']) && !empty($_POST['telefone_cliente'])) ?
		$telefone = $_POST['telefone_cliente'] : $erro = TRUE;						

	(isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) ?
		$acao = $_REQUEST['acao'] : $erro = TRUE;


	switch ($acao) {
			case 'insert':
				$query = 'INSERT INTO cliente(nome,cpf,endereco,telefone) 
						  values ("' . $nome . '","' . $cpf . '","' . $endereco . '","' . $telefone . '")';
				// echo $link;
				// echo $query;
				mysql_query($query,$link) or die(mysql_error());	
				header("location:index.php?pg=cliente&cadastrado=true");
				break;

			case 'edit':
				$query = "UPDATE cliente
						set nome = '$nome',
							cpf = '$cpf',
							endereco = '$endereco',
							telefone = '$telefone'
						where id_cliente = $idCliente";
				mysql_query($query,$link) or die();		
				header("location:index.php?pg=cliente");				
				break;

			case 'delete':				
				(isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) ?
					$id_cliente = $_GET['id_cliente'] : $erro = TRUE;

				$query = "delete from cliente where id_cliente = $id_cliente";
				mysql_query($query, $link);
				
				header("location:index.php?pg=cliente&excluido=true");	
				break;

			default:
				# code...
				break;
		}	
		// mysql_close();

		
		exit;
?> 

