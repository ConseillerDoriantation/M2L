<?php
	include('header.php');

	//Recuperer les valeurs du formulaire
	$sql = ("SELECT MAIL_DEM FROM DEMANDEURS WHERE MAIL_DEM = '".$_SESSION['connecte']."'");
	$result = $connexion->query($sql) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $result->fetch();
	$email = $ligne[0];

    $datefrais=$_POST['date'];
    $motif=$_POST['motif'];
    $trajet=$_POST['trajet'];
    $KM=$_POST['KM'];
    $cout_peage=$_POST['cout_peage'];
    $cout_repas=$_POST['cout_repas'];
    $cout_hebergement=$_POST['cout_hebergement'];


    // Mise en forme de la requête
	$reqSQL =$connexion->prepare('INSERT INTO lignes_frais(ADRESSE_MAIL,DATEFRAIS,TYPE_MOTIF,TRAJET,KM,COUT_PEAGE,COUT_REPAS,COUT_HEBERGEMENT) VALUES(upper(:email), :datefrais, :motif, :trajet, :KM, :cout_peage, :cout_repas, :cout_hebergement)');
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
?>

<script type="text/javascript">
   alert('Votre ligne de frais a été enregistré');
</script>

<?php
echo 'Vous allez être redirigé dans 5 secondes';
sleep(5);
 	// Un lien pour le retour vers le formulaire de saisie
    header('Location: accueil_demandeur.php');
?>
