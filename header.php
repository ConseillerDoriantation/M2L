<!--Bannière-->
<?php
	require("ConnexionBddID.php");
	session_start();
	if ($_SESSION['ok'] != "oui"){
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Pages du Stagiaire </title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
					<?php if(isset($_SESSION['ok'])){echo "<a href='".$_SESSION['typeIdentifiant']."' style='color:#FFFFFF ;'>".$_SESSION['connecte']."</a>";}?>
					<?php if(isset($_SESSION['ok'])){echo "<a href ='deconnexion.php'><img src='deconnexion.png'></a>";}?>
				</div>
			</div>
			
		</div>
	</nav>
</div>
<body>
