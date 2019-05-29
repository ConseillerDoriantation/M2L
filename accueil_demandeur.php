<?php
	include('header.php');
	if (strpos($_SESSION['connecte'], '@') == false) {
		header('Location: index.php');
	}
?>

<!-- Affichage de la bannière -->
<div class="accueil_profil">
	
	</br>
	<h1>Profil</h1>
	</br>
	<h4>Cette rubrique vous permet d'accéder à votre profil et </br>
	d'y consulter et modifier toutes les informations vous concernant.</h4>
	<a href="profil_demandeur.php" class="btn_index">Accès Profil</a>
</div>

<div class="accueil_frais">
	<br>
	<h1>Nouvelle ligne de frais </h1>
	</br>
	<h4>Cette rubrique vous permet de rédiger une nouvelle note de frais </br>
	en remplissant les informations demandées. </h4>
	<a href="nouveau_frais.php" style="background-color: #A6AFAE;" class="btn_index">Nouveau Frais</a>
</div>

				
<div class="accueil_listefrais">
	</br></br>
	<h1>Consulter vos frais </h1>
	<br>
	<h4>Cette rubrique vous permet de consulter les notes de frais </br>
	que vous avez envoyées</h4>
	<a href="liste_frais.php" class="btn_index">Consulter Frais</a>
</div>

<div class="accueil_frais">
	</br></br>
	<h1>Demande de frais </h1>
	<br>
	<h4>Cette rubrique vous permet de valider vos lignes de frais </br>
	avec la possibilité d'imprimer le formulaire</h4>
	<a href="pdf_frais.php" style="background-color: #A6AFAE;" class="btn_index">Demande de frais</a>
</div>
</html>
