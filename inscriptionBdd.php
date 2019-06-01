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
	
	$sqlIncrementNum = ("SELECT MAX(NUM_DEM) FROM demandeurs");
	$numId = $connexion->query($sqlIncrementNum) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $numId->fetch();
	$numero = $ligne[0]+1;

	if ($Identifiant != $VerifMdp){

		// On vérifie que l'adresse n'existe pas dans la BDD
		$sql = ("SELECT COUNT(MAIL_DEM) as mail_exists FROM DEMANDEURS WHERE MAIL_DEM = '".$Identifiant."'");
		$result = $connexion->query($sql) or die ("Erreur dans la requ&ecircte sql");
		$mailexists = $result->fetch();
		if($mailexists['mail_exists'] > 0)
		{
			header('Location: inscription.php?msg=2 ');
		}
		else
		{
			echo "samarch";
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
			echo "$Identifiant, $nom, $prenom, $rue, $cp, $ville, $numero, $mdp";
			header('Location: index.php?msg=1');
		}
	}
?>
