<?php
	include('header.php'); //Affichage de la bannière

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
				<h4 class="card-title mb-4">Demande de frais</h4>

				<!-- Formulaire -->
				<div class="inscriptionForm">
					<form method="post" action="pdf_frais_enregistrement.php" name="pdf_frais_enregistrement">
						<div class="form-row">
							<label>Je soussigné(e)</label>
							<input type="text" class="form-control" id="nom" name="nom" readonly="readonly" Value="<?php echo $nom.' '. $prenom ?> " >
						</div>
						<div class="form-row">
							<label>Demeurant</label>
							<input type="text" class="form-control" id="adresse" name="adresse" readonly="readonly" Value="<?php echo $rue.', '. $cp.' '.$ville ?> " />
						</div>
						
						<!--Tableau des lignes de frais-->
						<div style="clear:both"></div>  
						    <br />   
						    <div class="table-responsive">  
						      	<table class="table_bordered">  
							        <tr>
							            <th>Date</th>
							            <th>Motif</th>
							            <th>Trajet</th>
							            <th>Km</th>
							            <th>Trajet</th>
							            <th>péages</th>
							            <th>Repas</th>
							            <th>Héberg.</th>
							            <th >Total</th>
							        </tr>

							<!--Remplissage du tableau avec les lignes de frais du demandeur connect&eacute-->
	 						<?php

	 							//Execution de la requete
	 							$query = 'SELECT * FROM lignes_frais WHERE VALIDE = 0 AND ADRESSE_MAIL = "'.$_SESSION['connecte'].'"ORDER BY DATEFRAIS DESC';
            					$result=$connexion->query($query);        

            				$total = 0;
						    while($row=$result->fetch())  
						    {  
						     	//Remplace l'id motif par son libelle
						    	$query = 'SELECT * FROM motifs WHERE TYPE_MOTIF='.$row["TYPE_MOTIF"].'';
						    	$result_motif=$connexion->query($query);
						    	$lemotif=$result_motif->fetch();
						    ?> 

						        <tr>  <!-- METTRE LES INFORMATIONS A JOURS-->
						            <td style="background-color:#94DB70;"><?php echo $row["DATEFRAIS"]; ?></td>
						            <td style="background-color:#94DB70;"><?php echo $lemotif["LIBELLE"]; ?></td>
						            <td style="background-color:#94DB70;"><?php echo $row["TRAJET"]; ?></td>
						            <td style="background-color:#94DB70;"><?php echo $row["KM"]; ?></td>
						            <?php $cout_trajet = $row["KM"] * 0.28 ?>
						            <td style="background-color:lightblue;"><?php echo number_format($cout_trajet, 2); ?></td>
						            <td style="background-color:#94DB70;"><?php echo $row["COUT_PEAGE"]; ?></td>
						            <td style="background-color:#94DB70;"><?php echo $row["COUT_REPAS"]; ?></td>
						            <td style="background-color:#94DB70;"><?php echo $row["COUT_HEBERGEMENT"]; ?></td>
						            <?php $total_ligne = $row["COUT_PEAGE"] +  $row["COUT_REPAS"] + $row["COUT_HEBERGEMENT"] + $cout_trajet?>
						            <td style="background-color:lightblue;"><?php echo $total_ligne; ?></td>
						           
						        </tr>  

							<?php  
								//Calcul du total
								$total = $total + $total_ligne;
								$_SESSION['montanttotal'] = $total;
							}                      
							?>  
							        <tr>  
							            <td colspan="8" align="center">Montant Total des frais de d&eacuteplacements</td>  
							            <td style="background-color:lightblue;"><?php echo number_format($total, 2); ?></td>
							        </tr>   
							    </table>  
						    </div> 

					    	<label>Je suis le representant l&eacutegal des adh&eacuterents suivants: </label>
					    	<div style="background-color:#94DB70;" align="center">
						    <?php

						    	//Réecupère les adhérents liés au demandeur
							    $query = "SELECT * FROM adherents A, lien L WHERE A.NUMERO_LICENCE = L.NUMERO_LICENCE AND MAIL_DEM ='".$_SESSION["connecte"]."'";
            					$result=$connexion->query($query);

            					while($row=$result->fetch())  
						    	{ 
            				?>
													<input type="text" class="form-control" id="adresse" name="adresse" readonly="readonly" Value="<?php echo $row["NOM_ADH"].', '. $row["PRENOM_ADH"].' '.$row["NUMERO_LICENCE"] ?> " />

							<?php
							}
							?>
							</div>
							
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>Montant des dons</label>
								<input type="number" min="0" max="<?php echo number_format($total, 2); ?>" class="form-control" id="montantdon" name="montantdon" required>
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col-md-8">
								<label>A</label>
								<input type="text" class="form-control" id="ville" name="ville" placeholder="Ville" required>
							</div>
							<div class="form-group col-md-4">
								<label>le</label>
								<input type="date" min="2018-01-01" class="form-control" id="date" name="date" required>
							</div>
						</div>

							<!-- Boutons -->
						<input class="btn btn-info" type="submit" id="envoie" name="boutonValider" value="Envoyer" />
			      <input class="mr-5 btn btn-danger" type="reset" id="annule" name="boutonAnnuler" value="Annuler" />
						<a class="btn btn-warning" href="javascript:window.print()">Imprimer</a>
						<a class="btn btn-success" href="accueil_demandeur.php">Retour</a>

					</form>
				</div> <!-- fin formulaire -->
			</div><!-- Fin Card -->
		</div>
	</div>
</div> <!-- end wrapper -->

<!-- Impression de la page en pdf -->
<script src="~/js/jspdf.js"></script>
<script>
  var doc = new jsPDF('p', 'pt', 'letter');
  var specialElementHandlers = {
    '#editor': function (element, renderer) {
      return true;
    }          
  };     
  $('#btn_Pdfprint').click(function () {
    doc.fromHTML($('#myTabContent').html(), 25, 25, {
      'width': 790,
      'elementHandlers': specialElementHandlers
    });
    doc.save('mywebpagee.pdf');
    window.location.reload();
  });

  function generatePDF(){

  var conv = new ActiveXObject("pdfServMachine.converter");
  conv.convert("http://www.google.com", "c:\\google.pdf", false);
  WScript.Echo("finished conversion");
 }
 </script>
</body>
</html>
