<?php
	include('header.php'); 	

	//On récupère les informations de l'utilisateur connecté
	$sql = ("SELECT NOM_DEM,PRENOM_DEM,RUE_DEM,CP_DEM,VILLE_DEM FROM demandeurs WHERE MAIL_DEM = '".$_SESSION['connecte']."'");
	$result = $connexion->query($sql) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $result->fetch();
	$nom = $ligne[0];
	$prenom = $ligne[1];
	$rue = $ligne[2];
	$cp= $ligne[3];
	$ville = $ligne[4];
?>

<div id="wrapper">
	<div class="row justify-content-center">
		<div class="card col col-sm-10 col-md-6 col-lg-5" style="margin-top : 200px;">
			<!-- Card -->
			<div class="card-body">
				<h4 class="card-title mb-4">Nouvelle ligne de frais</h4>

				<!-- Formulaire -->
				<div class="inscriptionForm">
					<form method="post" action="nouveau_frais_enregistrement.php" action="nouveau_frais_enregistrement.php" method ="post" name="pdf_frais_enregistrement">
						<div class="form-row">
							<label>Je soussigné(e)</label>
							<input type="text" class="form-control" id="nom" name="nom" readonly="readonly" Value="<?php echo $nom.' '. $prenom ?> " >
						</div>
						<div class="form-row">
							<label>Demeurant</label>
							<input type="text" class="form-control" id="adresse" name="adresse" readonly="readonly" Value="<?php echo $rue.', '. $cp.' '.$ville ?> " />
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Date</label>
								<input type="date" class="form-control" id="date" name="date" min="2018-01-01" required>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Motif</label>
								<select name="motif" id="motif">
							 
								<?php
								$reponse = $connexion->query('SELECT libelle FROM motifs');
								$i = 1;
								while ($donnees = $reponse->fetch())
								{
								echo '<option id="list_id'.$i.'" value="'.$i.'">'.$donnees["libelle"].'</option>';

									$i++;
								}
								?>
								</select>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-8">
								<label>Trajet</label>
								<input type="text" class="form-control" id="trajet" name="trajet" required>
							</div>
							<div class="form-group col-md-4">
								<label>Kms</label>
								<input type="number" class="form-control" id="KM" name="KM" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-4">
								<label>Coûts</label>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Péage</label>
								<input type="number" class="form-control" id="cout_peage" name="cout_peage" required>
							</div>
							<div class="form-group col-md-3">
								<label>Repas</label>
								<input type="number" class="form-control" id="cout_repas" name="cout_repas" required>
							</div>
							<div class="form-group col-md-3">
								<label>Hebergement</label>
								<input type="number" class="form-control" id="cout_hebergement" name="cout_hebergement" required>
							</div>
						</div>

							<!-- Boutons -->
						<input class="btn btn-info" type="submit" id="envoie" name="boutonValider" value="Envoyer" />
			      		<input class="mr-5 btn btn-danger" type="reset" id="annule" name="boutonAnnuler" value="Annuler" />
						<a class="btn btn-success" href="accueil_demandeur.php">Retour</a>

					</form>
				</div> <!-- fin formulaire -->
			</div><!-- Fin Card -->
		</div>
	</div>
</div> <!-- end wrapper -->

</body>
</html>
