<?php	
	include('header.php');
	$mail = $_SESSION['connecte'];

	$sqlNom = ("SELECT NOM_DEM FROM demandeurs WHERE MAIL_DEM = '$mail'");
	$resultNom = $connexion->query($sqlNom) or die ("Erreur dans la requ&ecircte sql");
	$ligneNom = $resultNom->fetch();
	$nom = $ligneNom[0];

	$sqlPrenom = ("SELECT PRENOM_DEM FROM demandeurs WHERE MAIL_DEM = '$mail'");
	$resultPrenom = $connexion->query($sqlPrenom) or die ("Erreur dans la requ&ecircte sql");
	$lignePrenom = $resultPrenom->fetch();
	$prenom = $lignePrenom[0];

	$sqlRue = ("SELECT RUE_DEM FROM demandeurs WHERE MAIL_DEM = '$mail'");
	$resultRue = $connexion->query($sqlRue) or die ("Erreur dans la requ&ecircte sql");
	$ligneRue = $resultRue->fetch();
	$rue = $ligneRue[0];

	$sqlCP = ("SELECT CP_DEM FROM demandeurs WHERE MAIL_DEM = '$mail'");
	$resultCP = $connexion->query($sqlCP) or die ("Erreur dans la requ&ecircte sql");
	$ligneCP = $resultCP->fetch();
	$cp = $ligneCP[0];

	$sqlVille = ("SELECT VILLE_DEM FROM demandeurs WHERE MAIL_DEM = '$mail'");
	$resultVille = $connexion->query($sqlVille) or die ("Erreur dans la requ&ecircte sql");
	$ligneVille = $resultVille->fetch();
	$ville = $ligneNom[0];
?>


<div class="FonddemandeurProfil">
	</br>
	<h5>Retrouvez ici vos informations personnelles</h5>
	<div class="FormdemandeurProfil">
		<table>
		<tr>
			<td><?php echo "Nom " ; ?></td>
			<td><?php echo ":" ; ?></td>
			<td><?php echo $nom; ?></td>
		</tr>
		<tr>
			<td><?php echo "Prenom " ; ?></td>
			<td><?php echo ":" ; ?></td>
			<td><?php echo $prenom; ?></td>
		</tr>
		<tr>
			<td><?php echo "Adresse " ; ?></td>
			<td><?php echo ":" ; ?></td>
			<td><?php echo $rue, " ", $cp, " ", $ville; ?></td>
		</tr>
		</table>
	</div>
</div>

<?php
	include("footer.html");
?>
