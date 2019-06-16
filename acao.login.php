<?php
    require_once('inc.connect.php');    
    session_start();
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$pass_md5 = md5($pass);
    // SALVAR CRIPTOGRAFADA A SENHA NO BANCO
    $query = 'SELECT * from usuarios where usuario = \'' . $user . '\' and senha = \'' . $pass_md5 . '\';';
    $res = mysql_query($query,$link);
    $qtd = mysql_num_rows($res);

    if($qtd > 0){
        $_SESSION['login']['user'] = $user;
        $_SESSION['login']['pass'] = $pass_md5;
        $_SESSION['login']['dthr'] = date("Y-m-d H:i:s");
        header('location:index.php?pg=cliente');
        exit;
    }
    header('Location: index.php?wronglogin'); 
    

?>