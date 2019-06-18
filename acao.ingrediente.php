<?php 
	require_once('inc.connect.php');

	(isset($_POST['idIngrediente']) && !empty($_POST['idIngrediente'])) ?
		$idIngrediente = $_POST['idIngrediente'] : $erro = TRUE;

	(isset($_POST['nome_ingrediente']) && !empty($_POST['nome_ingrediente'])) ?
		$nome = $_POST['nome_ingrediente'] : $erro = TRUE;

	(isset($_POST['valor_ingrediente']) && !empty($_POST['valor_ingrediente'])) ?
		$valor = $_POST['valor_ingrediente'] : $erro = TRUE;

	(isset($_POST['dataFabricacao_ingrediente']) && !empty($_POST['dataFabricacao_ingrediente'])) ?
		$data_fabricacao = $_POST['dataFabricacao_ingrediente'] : $erro = TRUE;

	(isset($_POST['dataValidade_ingrediente']) && !empty($_POST['dataValidade_ingrediente'])) ?
		$data_validade = $_POST['dataValidade_ingrediente'] : $erro = TRUE;		
		
	(isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) ?
		$acao = $_REQUEST['acao'] : $erro = TRUE;	

	switch ($acao) {
			case 'insert':
				$query = 'INSERT INTO ingrediente(nome,valor,data_compra,data_validade) 
						  values ("' . $nome . '","' . $valor . '","' . $data_fabricacao . '","' . $data_validade . '")';
				mysql_query($query,$link) or die();		  
				
				header('location:index.php?pg=ingrediente&cadastrado=true');
				break;

			case 'edit':
			echo "aqui";
				$query = "UPDATE ingrediente
						set nome = '$nome',
							valor = $valor,
							data_compra = '$data_fabricacao',
							data_validade = '$data_validade'
						where id_ingrediente = $idIngrediente";
						echo $query;
				mysql_query($query,$link) or die();		

				header('location:index.php?pg=ingrediente&editado=true');
				break;

			case 'delete':
				(isset($_GET['id_ingrediente']) && !empty($_GET['id_ingrediente'])) ?
					$id_ingrediente = $_GET['id_ingrediente'] : $erro = TRUE;

				$query = "delete from ingrediente where id_ingrediente = $id_ingrediente";
				mysql_query($query, $link);
				
				header("location:index.php?pg=ingrediente&excluido=true");	
				break;

			default:
				# code...
				break;
		}	
		
?> 

