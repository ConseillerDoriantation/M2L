<?php
	include('header.php');

	//Recuperer les valeurs du formulaire
    $email=$_POST['email'];
    $datefrais=$_POST['date'];
    $motif=$_POST['motif'];
    $trajet=$_POST['trajet'];
    $KM=$_POST['KM'];
    $cout_peage=$_POST['cout_peage'];
    $cout_repas=$_POST['cout_repas'];
    $cout_hebergement=$_POST['cout_hebergement'];


    // Mise en forme de la requête
	$reqSQL =$connexion->prepare('INSERT INTO lignes_frais(ADRESSE_MAIL,DATEFRAIS,TYPE_MOTIF,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT) VALUES(:email, :datefrais, :motif, :trajet, :KM, :cout_peage, :cout_repas, :cout_hebergement)');
	$reqSQL->execute(array(
		'email' => $email,
		'datefrais' => $datefrais,
		'motif' => $motif,
		'trajet' => $trajet,
		'KM' => $KM,
		'cout_peage' => $cout_peage,
		'cout_repas' => $cout_repas,
		'cout_hebergement' => $cout_hebergement
		));

	// Affichage d'un message d'information 
	$info="Votre demande de frais a bien été envoyé.";
	echo $info;

    // Un lien pour le retour vers le formulaire de saisie
    include("index.php");
    
?>
