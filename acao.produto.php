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
	
	(isset($_POST['quantidade_ingredientes']) && !empty($_POST['quantidade_ingredientes'])) ?
		$qtd_ingredientes = $_POST['quantidade_ingredientes'] : $erro = TRUE;	

	$multi = false;

	if($qtd_ingredientes > 1){
		$multi = true;
		for($x = 1; $x<$qtd_ingredientes; $x++){
			$ingrediente_ = 'ingrediente_'.$x;
			$quantidade_ = 'quantidade_'.$x;
			(isset($_POST[$ingrediente]) && !empty($_POST[$ingrediente])) ?
				$ingrediente[$x] = $_POST[$ingrediente] : $erro = TRUE;
			(isset($_POST[$quantidade_]) && !empty($_POST[$quantidade_])) ?
				$qtd[$x] = $_POST[$quantidade_] : $erro = TRUE;	
		}
	}else{
		(isset($_POST['ingrediente_1']) && !empty($_POST['ingrediente_1'])) ?
			$ingrediente = $_POST['ingrediente_1'] : $erro = TRUE;
		(isset($_POST['quantidade_1']) && !empty($_POST['quantidade_1'])) ?
			$qtd = $_POST['quantidade_1'] : $erro = TRUE;		
	}

	switch ($_POST['acao']) {
			case 'insert':
				$query = 'INSERT INTO produto(nome,valor,data_feito,data_validade) 
						  values ("' . $nome . '","' . $valor . '","' . $data_fabricacao . '","' . $data_validade . '")';
				mysql_query($query,$link);
				$lid = mysql_insert_id();
				if($multi){
					for($x = 1; $x<$qtd_ingredientes; $x++){
						$query2 = 'INSERT INTO ingredientes_produto(id_produto, id_ingrediente, quantidade) 
								values (' . $lid . ',' . $ingrediente[$x] . ',' . $qtd[$x] . ')';
						mysql_query($query2,$link);
					}	
				}else{
					$query2 = 'INSERT INTO ingredientes_produto(id_produto, id_ingrediente, quantidade) 
							   values (' . $lid . ',' . $ingrediente . ',' . $qtd . ')';
					mysql_query($query2,$link);	
				}
					  
					  
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

