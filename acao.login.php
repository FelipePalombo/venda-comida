<?php
session_start();
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$pass_md5 = md5($pass);
    // SALVAR CRIPTOGRAFADA A SENHA NO BANCO
    
	if($user == 'admin' && $pass_md5 == 'e1b7e7803215d5488588370572d13102'){		
		$_SESSION['login']['user'] = $user;
		$_SESSION['login']['pass'] = $pass_md5;
		$_SESSION['login']['dthr'] = date("Y-m-d H:i:s");
		header('location:index.php?pg=cliente');
	}else{
		header('Location: index.php?wronglogin');
	}	
    die;
?>