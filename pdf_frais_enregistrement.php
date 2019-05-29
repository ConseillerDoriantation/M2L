<?php
	include('header.php');

	//Recuperer les valeurs du formulaire
	$sql = ("SELECT MAIL_DEM FROM DEMANDEURS WHERE MAIL_DEM = '".$_SESSION['connecte']."'");
	$result = $connexion->query($sql) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $result->fetch();
	$email = $ligne[0];

    $datedemande=$_POST['date'];
    $montanttotal=$_SESSION['montanttotal'];
    $montantdon=$_POST['montantdon'];

	$reqSQL =$connexion->query("UPDATE lignes_frais SET VALIDE = 1 WHERE VALIDE = 0 AND ADRESSE_MAIL = '".$_SESSION['connecte']."'");

	// Mise en forme de la requête
	$reqSQL =$connexion->prepare('INSERT INTO demande_frais(MAIL_DEM, DATE_DEMANDE, MONTANT_TOTAL, MONTANT_DON) VALUES(upper(:email), :datedemande, :montanttotal, :montantdon)');
	$reqSQL->execute(array(
		'email' => $email,
		'datedemande' => $datedemande,
		'montanttotal' => $montanttotal,
		'montantdon' => $montantdon
		));

	header('Location: accueil_demandeur.php');


?>
