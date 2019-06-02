<?php
	require("connexionBddID.php");
	session_start();
	if (($_SESSION['ok'] != "oui" && basename($_SERVER['PHP_SELF']) != "index.php" && basename($_SERVER['PHP_SELF']) != "inscription.php")){
		header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang='fr'>
<head>
	<title> M2L </title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<?php
	if (isset($_SESSION['ok']) && $_SESSION['ok'] = "oui" && basename($_SERVER['PHP_SELF']) != "index.php" && basename($_SERVER['PHP_SELF']) != "inscription.php")
	{
	?>
	<!-- Barre de naviguation -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="accueil_demandeur.php">Accueil</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
			</ul>
			<span class="navbar-text">
			<a href="profil_demandeur.php" class="mr-2"><?php echo $_SESSION['connecte'] ?></a>
			<a href="deconnexion.php"><i class="fas fa-sign-out-alt"></i></a>
			</span>
		</div>
	</nav>
	<?php
	}
	?>
<body>
