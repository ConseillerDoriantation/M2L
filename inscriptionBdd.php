<?php 
	ob_start();

	// On récupère les données saisies dans le formulaire
	$Identifiant = $_POST["adrMel"];
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$ville = $_POST["ville"];
	$rue = $_POST["rue"];
	$cp = $_POST["cp"];
	$mdp = $_POST["mdp"];
	$confirmMdp = $_POST["mdpConfirm"];

	$sqlVerifMdp = ("SELECT MAIL_DEM FROM demandeurs");
	$test = $connexion->query($sqlVerifMdp) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $test->fetch();
	$VerifMdp = $ligne[0];
	
	$sqlIncrementNum = ("SELECT MAX(NUM_DEM) FROM demandeurs");
	$numId = $connexion->query($sqlIncrementNum) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $numId->fetch();
	$numero = $ligne[0]+1;

	if (($mdp == $confirmMdp) && ($Identifiant != $VerifMdp)){
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
		//include("index.php");
	}

	else{
		$messageErreur = "erreur, mot de passe ou identifiant incorrect";
		echo "<script type='text/javascript'>alert('$messageErreur');</script>";
	}
?>
