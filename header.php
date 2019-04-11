<!--Bannière-->
<?php
	Session_start();							//Demarrage de la session

	require("ConnexionBddID.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title> M2L </title>

	<!-- Accents -->

	<meta charset=utf-8" />


	<!--CSS-->
	<link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<div class="-">
	<nav class="menu" role="navigation">
		<div class="inner">
			 <div class="m-left">
			 	<h1 class="logo">Maison des Ligues de Lorraine</h1>
			 </div>

			 	<div class="m-right">
			 		<div class="m-link">
					 	<p style="color: white">
					 		Bienvenue <?php if(isset($_SESSION['ok'])){echo $_SESSION['connecte'];}?>
						<p>
					</div>
				</div>
			</div>
		</nav>
</div>
<body>
