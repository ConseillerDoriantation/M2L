<?php 
	ob_start();
	require("connexionBddID.php");

	// On récupère les données saisies dans le formulaire
	$Identifiant = $_POST["adrMel"];
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$ville = $_POST["ville"];
	$rue = $_POST["rue"];
	$cp = $_POST["cp"];
	$mdp = $_POST["mdp"];

	$sqlVerifMdp = ("SELECT MAIL_DEM FROM demandeurs");
	$test = $connexion->query($sqlVerifMdp) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $test->fetch();
	$VerifMdp = $ligne[0];
	
	// Incrémente le NUM_DEM
	$sqlIncrementNum = ("SELECT MAX(NUM_DEM) FROM demandeurs");
	$numId = $connexion->query($sqlIncrementNum) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $numId->fetch();
	$numero = $ligne[0]+1;

	// On vérifie que l'adresse n'existe pas dans la BDD
	if ($Identifiant != $VerifMdp){

		$sql = ("SELECT COUNT(MAIL_DEM) as mail_exists FROM demandeurs WHERE MAIL_DEM = '".$Identifiant."'");
		$result = $connexion->query($sql) or die ("Erreur dans la requ&ecircte sql");
		$mailexists = $result->fetch();

		// Si c'est >0, soit qu'il en existe un, on redirige à la page d'inscription avec un message d'erreur
		if($mailexists['mail_exists'] > 0)
		{
			header('Location: inscription.php?msg=2 ');
		}
		else // Si elle n'existe pas, on enregistre les informations, on redirige à la page de connexion avec un message de succès
		{
			$reqSQL =$connexion->prepare('INSERT INTO demandeurs(MAIL_DEM, NOM_DEM, PRENOM_DEM, RUE_DEM, CP_DEM, VILLE_DEM, NUM_DEM, MDP_DEM) 
				VALUES(:id, :nom, :pre, :rue, :cp, :ville, :num , :mdp)');
			$reqSQL -> execute(array(
				'id' => $Identifiant, 
				'nom' => $nom, 
				'pre' => $prenom, 
				'rue' => $rue, 
				'cp' => $cp,
				'ville' => $ville, 
				'num' => $numero, 
				'mdp' => $mdp));
			header('Location: index.php?msg=1');
		}
	}
?>
