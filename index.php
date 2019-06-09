<!--//conecBD
//banner
//menu


//content.php


//rodapé
-->
<?php
	require_once('inc.connect.php');
?>
<html>
	<head>		
		<!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" type="text/css" href="./Bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./css/site.css">
		<link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
		<title>VendaApp</title>
	</head>
	<body>
	<div class="container-fluid d-flex flex-column no-gutters">	
		<?php
			if(isset($_GET['acao']) && $_GET['acao'] == 'logoff'){
				session_start();
				session_destroy();
			}			
			if(isset($_GET['pg']) && !empty($_GET['pg'])){ //função isset verifica se variavel é nula ou nao 
				include_once('loginbarrier.php');
				include_once('menu.php');
				$pag = $_GET['pg'];
				include('inc.' . $pag . '.php');
			}else{
				include_once('login.php');	
			}
			// require - encerra a execução do programa
			// include - executa com erro
			// require_once 
			// include_once 
		?>
	</div>		
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>		
	
	</body>	
</html>


<?php
	mysql_close($link);
?>