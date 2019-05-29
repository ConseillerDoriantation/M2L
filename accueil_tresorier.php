<?php
	include('header.php');
	if (strpos($_SESSION['connecte'], '@') == true) {
		header('Location: index.php');
	}
?>

<!-- Affichage de la bannière -->

<div class="accueil_avalider">
	</br>
	<h1>Frais à valider</h1>
	</br>
	<h4> Retrouver dans cette rubrique les frais qu'il vous reste à valider </h4>
	<a href="#.php" class="btn_index">Accès Frais à valider</a>
</div>

<div class="accueil_fraisvalide">
	<br>
	<h1>Frais Validé</h1>
	</br>
		<a href="#.php" class="btn_index">Consulter Frais validé</a>
</div>
</html>
