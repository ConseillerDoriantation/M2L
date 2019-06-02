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

<div id="wrapper">
	<div class="row justify-content-center">
		<div class="card col col-sm-10 col-md-6 col-lg-5" style="margin-top : 200px;">
			<div class="card-body">
				<form method="post" action="inscriptionBdd.php" name="inscription">
					<div class = "form-row">
						<label>Nom :</label>
						<input type="text" placeholder="Nom" class="form-control" id="nom" class="case" readonly="readonly" Value="<?php echo $nom ?> " />
					</div>
					<div class = "form-row">
						<label>Prenom :</label>
						<input type="text" placeholder="Prenom" class="form-control" id="prenom" class="case" readonly="readonly" Value="<?php echo $prenom ?> " />
					</div>
					<div class = "form-row">
						<label>Adresse :</label>
						<input type="text" placeholder="Nom" class="form-control" id="adresse" class="case" readonly="readonly" Value="<?php echo $rue. " ". $cp. " ". $ville ?> " />
					</div>
					<div class = "form-row">
						<label>Responsable des adhérents :</label>
						<?php
							    $query = "SELECT * FROM adherents A, lien L WHERE A.NUMERO_LICENCE = L.NUMERO_LICENCE AND MAIL_DEM ='".$_SESSION["connecte"]."'";
            					$result=$connexion->query($query);

            					while($row=$result->fetch())  
						    	{ 
									?>
									<input type="text" placeholder="adherent" class="form-control" id="adherent" class="case" readonly="readonly" Value="<?php echo $row['NOM_ADH'].' '.$row["PRENOM_ADH"]?>">
									<?php
								}
						?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
