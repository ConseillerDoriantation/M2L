<?php 
	ob_start();
// Appel du script de connexion au serveur et à la base de données
	require("ConnexionBddID.php"); 	

// On récupère les données saisies dans le formulaire
	$Identifiant = $_POST["identifiant"];
	$motPasseSaisi = $_POST["mdp"];

	if (strpos($Identifiant, '@') == false)
		$sql = ("SELECT MDP_TRE FROM tresoriers WHERE LOGIN_TRE = '$Identifiant'");
	else
		$sql = ("SELECT MDP_DEM FROM demandeurs WHERE MAIL_DEM = '$Identifiant'");
	
	$result = $connexion->query($sql) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $result->fetch();
	$motPasseBdd = $ligne[0];

	// On vérifie que le mot de passe saisi est identique à celui enregistré dans la base de données

	if  ($motPasseSaisi!=$motPasseBdd)
	// Le mot de passe est différent de celui de la base utilisateur
	{
		// On inclut le formulaire d'identification (index.html)
		include("index.php");
		echo "<center>Saisie erronée, veuillez re-essayer</center>"; 
		// On quitte le script courant sans effectuer les éventuelles instructions qui suivent
		exit; 
	}

	else
	// Le mot de passe saisi correspond à celui de la base utilisateur
	{
		//Demarrage d'une session
		session_start();
		//creation d'une variable
		$_SESSION['ok']="oui";
		$_SESSION['connecte'] = $Identifiant;

		// Retour vers la page d'entrée du site
		
		if (strpos($Identifiant, '@') == false)
		{
			$_SESSION['typeIdentifiant'] = ('accueil_tresorier.php');
			header('Location: accueil_tresorier.php');
		}
		else
		{
			header('Location: accueil_demandeur.php');
		 	$_SESSION['typeIdentifiant'] = ('accueil_demandeur.php');
		}
		
		ob_end_flush();
		// On quitte le script courant sans effectuer les éventuelles  instructions qui suivent
		exit;
	}

	//on libère le jeu d'enregistrement
	$result->closeCursor();
	// on ferme la connexion au SGBD
	$connexion=null;
?>
