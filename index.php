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
		<title>VendaApp</title>
	</head>
	<body>
	<div class="container-fluid d-flex flex-column no-gutters">	
		<div class="d-flex justify-content-center">
			<h4>VendaApp Banner</h4>
		</div>
		<div class="row mb-3">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12">
			  	<a class="navbar-brand" href="#">VendaApp</a>
			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="	#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="	Toggle navigation">
			  	  <span class="navbar-toggler-icon"></span>
			  	</button>
			  	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			  	  <div class="navbar-nav">
			  	    <a class="nav-item nav-link active" href="index.php?pg=home">Home <span class="sr-only">(current)</span></a	>
			  	    <a class="nav-item nav-link" href="index.php?pg=produto">Produto</a>
			  	    <a class="nav-item nav-link" href="index.php?pg=ingrediente">Ingrediente</a>
			  	    <a class="nav-item nav-link" href="index.php?pg=cliente">Cliente</a>
			  	    <a class="nav-item nav-link" href="index.php?pg=venda">Venda</a>
			  	  </div>
			  	</div>
			</nav>
		</div>		

		<?php
			if(isset($_GET['pg']) && !empty($_GET['pg'])){ //função isset verifica se variavel é nula ou nao 
				$pag = $_GET['pg'];
			}else{
				$pag = 'venda';
			}
			// require - encerra a execução do programa
			// include - executa com erro
			// require_once 
			// include_once 

			include_once('inc.' . $pag . '.php');
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