<?php 
//print_r($_POST);
//die;
	require_once('inc.connect.php');

	$dir = 'imagens/';
	$arqdir = '';
	$dthr_agora = date("YmdHis");

	if(isset($_FILES['arquivo']) && !empty($_FILES['arquivo'])){
		$arq_name = $_FILES['arquivo']['name'];
		if(!empty($arq_name)){
			$arq_name = $dthr_agora . '_' .  $arq_name;	
			$tmp_name = $_FILES['arquivo']['tmp_name'];	
			echo $arq_name;
			echo '<br>' . $tmp_name;
			move_uploaded_file($tmp_name, $dir.$arq_name);
		}else{	
			if(isset($_POST['arquivo_antigo']) && !empty($_POST['arquivo_antigo']) 
			&& $_POST['arquivo_antigo'] != 'imagens/no-food.png'){
				$arqdir = $_POST['arquivo_antigo'];
			}else{
				$arq_name = 'no-food.png';
			}					
		}			
	}

	(isset($_POST['idProduto']) && !empty($_POST['idProduto'])) ?
		$idProduto = $_POST['idProduto'] : $erro = TRUE;

	(isset($_POST['nome_produto']) && !empty($_POST['nome_produto'])) ?
		$nome = $_POST['nome_produto'] : $erro = TRUE;

	(isset($_POST['valor_produto']) && !empty($_POST['valor_produto'])) ?
		$valor = $_POST['valor_produto'] : $erro = TRUE;

	(isset($_POST['dataFabricacao_produto']) && !empty($_POST['dataFabricacao_produto'])) ?
		$data_fabricacao = $_POST['dataFabricacao_produto'] : $erro = TRUE;

	(isset($_POST['dataValidade_produto']) && !empty($_POST['dataValidade_produto'])) ?
		$data_validade = $_POST['dataValidade_produto'] : $erro = TRUE;		
	
	(isset($_POST['quantidade_ingredientes_edit']) && !empty($_POST['quantidade_ingredientes_edit'])) ?
		$qtd_ingredientes = $_POST['quantidade_ingredientes_edit'] : $erro = TRUE;	

	(isset($_POST['quantidade_ingredientes']) && !empty($_POST['quantidade_ingredientes'])) ?
		$qtd_ingredientes = $_POST['quantidade_ingredientes'] : $erro = TRUE;	

	$multi = false;

	if($qtd_ingredientes > 1){
		$multi = true;
		
		for($x = 1; $x<=$qtd_ingredientes; $x++){
			$ingrediente_ = 'ingrediente_'.$x;
			$quantidade_ = 'quantidade_'.$x;
			$conexao_ = 'conexao_'.$x;

			(isset($_POST[$ingrediente_]) && !empty($_POST[$ingrediente_])) ?
				$ingrediente[$x] = $_POST[$ingrediente_] : $erro = TRUE;
				
			(isset($_POST[$quantidade_]) && !empty($_POST[$quantidade_])) ?
				$qtd[$x] = $_POST[$quantidade_] : $erro = TRUE;	

			(isset($_POST[$conexao_]) && !empty($_POST[$conexao_])) ?
				$conexao[$x] = $_POST[$conexao_] : $erro = TRUE;									
		}
	}else{
		(isset($_POST['ingrediente_1']) && !empty($_POST['ingrediente_1'])) ?
			$ingrediente = $_POST['ingrediente_1'] : $erro = TRUE;

		(isset($_POST['quantidade_1']) && !empty($_POST['quantidade_1'])) ?
			$qtd = $_POST['quantidade_1'] : $erro = TRUE;
			
		(isset($_POST['conexao_1']) && !empty($_POST['conexao_1'])) ?
			$conexao = $_POST['conexao_1'] : $erro = TRUE;	
	}

	(isset($_REQUEST['acao']) && !empty($_REQUEST['acao'])) ?
		$acao = $_REQUEST['acao'] : $erro = TRUE;

	switch ($acao) {
			case 'insert':
				$query = 'INSERT INTO produto(nome,valor,data_feito,data_validade,produto_caminho_img) 
						  values ("' . $nome . '","' . $valor . '","' . $data_fabricacao . '","' . $data_validade . '","' . $dir.$arq_name . '")';
				mysql_query($query,$link);
				$lid = mysql_insert_id();
				if($multi){
					//echo '<br>$qtd_ingredientes: ' . $qtd_ingredientes;
					//echo '<br>$lid :' . $lid;
					for($x = 1; $x<=$qtd_ingredientes; $x++){
						$query2 = 'INSERT INTO ingredientes_produto(id_produto, id_ingrediente, quantidade) 
								values (' . $lid . ',' . $ingrediente[$x] . ',' . $qtd[$x] . ')';
						//echo '<br> $query2' . $query2;
						mysql_query($query2,$link);
					}	
				}else{
					$query2 = 'INSERT INTO ingredientes_produto(id_produto, id_ingrediente, quantidade) 
							   values (' . $lid . ',' . $ingrediente . ',' . $qtd . ')';
					mysql_query($query2,$link);	
				}					  
				header('location:index.php?pg=produto&cadastrado=true');					  
				break;

			case 'edit':
				$arq = (empty($arqdir)) ? ($dir.$arq_name) : $arqdir;
				$query = "UPDATE produto
						set produto_caminho_img = '$arq',
							nome = '$nome',
							valor = $valor,
							data_feito = '$data_fabricacao',
							data_validade = '$data_validade'
						where id_produto = $idProduto";				
				mysql_query($query,$link) or die();	
				if($multi){
					for($x = 1; $x<=$qtd_ingredientes; $x++){
						$query2 = 'UPDATE ingredientes_produto 
								set	id_ingrediente = ' . $ingrediente[$x] .', 
									quantidade =' . $qtd[$x] . '
								where id_produto = ' . $idProduto . ' and id_ingredientes_produto = ' . $conexao[$x];
						//echo '<br> $query2' . $query2;
						mysql_query($query2,$link) or die();
					}	
				}else{
					$query2 = 'UPDATE ingredientes_produto 
								set	id_ingrediente = ' . $ingrediente .', 
									quantidade =' . $qtd. '
								where id_produto = ' . $idProduto . ' and id_ingredientes_produto = ' . $conexao;
						//echo '<br> $query2' . $query2;
					mysql_query($query2,$link) or die();
				}					

				header('location:index.php?pg=produto');
				break;

			case 'delete':
				(isset($_GET['id_produto']) && !empty($_GET['id_produto'])) ?
					$id_produto = $_GET['id_produto'] : $erro = TRUE;
					
				$query = "delete from ingredientes_produto where id_produto = $id_produto";
				mysql_query($query, $link);
				$query = "delete from produto where id_produto = $id_produto";
				mysql_query($query, $link);
				
				header("location:index.php?pg=produto&excluido=true");				
				break;

			default:
				# code...
				break;
		}	
		mysql_close();
		
		exit;

?> 

