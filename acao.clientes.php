<?php 
//print_r($_POST);
//die;
	require_once('./funcoes/inc.cliente_funcoes.php');
	require_once('inc.connect.php');
	$excluido = false;
	$cadastrado = false;

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
				$arq_name = 'no-profile.png';
			}					
		}			
	}

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
				$itens['nome'] = $nome;
				$itens['cpf'] = $cpf;
				$itens['endereco'] = $endereco;
				$itens['cliente_caminho_img'] = $dir . $arq_name;
				$itens['telefone'] = $telefone;
				
				insereCliente($itens, $link);
				header("location:index.php?pg=cliente&cadastrado=true");
			break;

			case 'edit':
				$itens['arq'] = empty($arqdir) ? $dir.$arq_name : $arqdir;
				$itens['nome'] = $nome;
				$itens['cpf'] = $cpf;
				$itens['endereco'] = $endereco;
				$itens['telefone'] = $telefone;
				$itens['idCliente'] = $idCliente;

				atualizaCliente($itens, $link);	
				header("location:index.php?pg=cliente&editado=true");				
			break;

			case 'delete':				
				(isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) ?
					$id_cliente = $_GET['id_cliente'] : $erro = TRUE;

				deletaCliente($id_cliente,$link);
				
				header("location:index.php?pg=cliente&excluido=true");	
			break;

			default:
				header("location:index.php?pg=cliente");
			break;
		}	
		// mysql_close();

		
		exit;
?> 

