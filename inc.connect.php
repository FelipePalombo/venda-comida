<?php
	
	define('DB_SERVIDOR' , 'localhost');
	define('DB_USUARIO' , 'root');
	define('DB_SENHA' , '');
	define('DB_BANCO' , 'venda_comida');

	$link = mysql_connect(DB_SERVIDOR,DB_USUARIO,DB_SENHA) or die('Não foi possivel conectar no servidor');
	
	mysql_select_db(DB_BANCO,$link) or die('Erro ao conectar no banco de dados');

	echo $link;
?>	