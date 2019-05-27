<?php
	include('header.php'); //Affichage de la bannière

	//On récupère les informations de l'utilisateur connecté
	$sql = ("SELECT NOM_DEM,PRENOM_DEM,RUE_DEM,CP_DEM,VILLE_DEM FROM DEMANDEURS WHERE MAIL_DEM = '".$_SESSION['connecte']."'");
	$result = $connexion->query($sql) or die ("Erreur dans la requ&ecircte sql");
	$ligne = $result->fetch();
	$nom = $ligne[0];
	$prenom = $ligne[1];
	$rue = $ligne[2];
	$cp= $ligne[3];
	$ville = $ligne[4];
?>
	</br>
	</br>	

	<div class="formulaire" id="form_to_print"> 

		<table class="form" border="none" id="table_print">
			<tr>
				<td>

					<!--Formulaire d'impression PDF-->
					<form name="inscription" action="templates/form_enregistrement.php" method ="post" onsubmit="javascript: return verifSaisie();">
					</br></br>
						<fieldset class="separateur"><legend class="legende">Note de frais des b&eacuten&eacutevoles</legend>

							</br></br></br>

						    <label>Je soussign&eacute(e)</label>
						    </br>
						    <input type="text" placeholder="Nom"   id="nom" name="nom" maxlength="20" size="90" class="case"readonly="readonly" Value="<?php echo $nom.' '. $prenom ?> " />		
						    </br>
						    <label>demeurant</label>
							</br>
						    <input type="text" placeholder="rue, cp ville" id="ville" name="ville" maxlength="20" size="90" class="case" readonly="readonly" Value="<?php echo $rue.', '. $cp.' '.$ville ?> " />
						    </br>	
						    <label>certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association</label>
						    </br>
							<input type="text" placeholder="ex: Association, rue - cp Ville" id="association" name="association" maxlength="20" size="90" class="case" />
							</br>
							<label>en tant que don.</label>
							</br></br></br>
							
							<label>Frais d&eacuteplacement</label>

							<!--Tableau des lignes de frais-->
							<div style="clear:both"></div>  
						    <br />   
						    <div class="table-responsive">  
						      	<table class="table_bordered">  
						      		<colgroup width="30%"></colgroup>
						      		<colgroup width="10%"></colgroup>
						      		<colgroup width="20%"></colgroup>
						      		<colgroup width="10%"></colgroup>
						      		<colgroup width="10%"></colgroup>
						      		<colgroup width="5%"></colgroup>
						      		<colgroup width="5%"></colgroup>
						      		<colgroup width="5%"></colgroup>
						      		<colgroup width="5%"></colgroup>
							        <tr>
							            <th>Date aaaa-mm-jj</th>
							            <th>Motif</th>
							            <th>Trajet</th>
							            <th>Kms parcourus</th>
							            <th>Co&ucirct Trajet</th>
							            <th>p&eacuteages</th>
							            <th>Repas</th>
							            <th>H&eacutebergement</th>
							            <th >Total</th>
							        </tr>

							<!--Remplissage du tableau avec les lignes de frais du demandeur connect&eacute-->
	 						<?php

	 							//Execution de la requete
	 							$query = 'SELECT * FROM lignes_frais WHERE ADRESSE_MAIL = "'.$_SESSION['connecte'].'"ORDER BY DATEFRAIS DESC';
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
						            <td style="background-color:#94DB70;"><?php echo $row["COUT_PEAGE"]; ?></td> <!--METTRE LES VALIDES-->
						            <td style="background-color:#94DB70;"><?php echo $row["COUT_REPAS"]; ?></td>
						            <td style="background-color:#94DB70;"><?php echo $row["COUT_HEBERGEMENT"]; ?></td>
						            <?php $total_ligne = $row["COUT_PEAGE"] +  $row["COUT_REPAS"] + $row["COUT_HEBERGEMENT"] + $cout_trajet?>
						            <td style="background-color:lightblue;"><?php echo $total_ligne; ?></td>
						           
						        </tr>  

							<?php  
								//Calcul du total
								$total = $total + $total_ligne;
							}                      
							?>  
							        <tr>  
							            <td colspan="8" align="center">Montant Total des frais de d&eacuteplacements</td>  
							            <td style="background-color:lightblue;"><?php echo number_format($total, 2); ?></td>
							        </tr>   
							    </table>  
						    </div> 
							</br>


					    	<label>Je suis le representant l&eacutegal des adh&eacuterents suivants: </abel>
					    	</br>
					    	<div style="background-color:#94DB70;" align="center">
						    <?php

						    	//R&eacutecupère les adh&eacuterents li&eacutes au demandeur
							    $query = "SELECT * FROM ADHERENTS A, LIEN L WHERE A.NUMERO_LICENCE = L.NUMERO_LICENCE AND MAIL_DEM ='".$_SESSION["connecte"]."'";
            					$result=$connexion->query($query);

            					while($row=$result->fetch())  
						    	{ 
            				?>
							    	<?php echo $row["NOM_ADH"]; ?>
							    	<?php echo $row["PRENOM_ADH"]; ?>, Licence n°
							    	<?php echo $row["NUMERO_LICENCE"]; ?>
							    </br>
							<?php
							}
							?>
							</div>

						    </br>
						    <label>Montant des dons</label> <!-- Mets la valeur du don souhait&eacute, mais ne doit aps exceder le total-->
					    	<input type="text" id="lieu" name="lieu" maxlength="20" size="20" style="background-color:lightblue;"/>
						    </br>
						    <label>Pour b&eacuten&eacuteficier du reçu de dons, cette note de frais doit être accompagn&eacute de toutes les justificatifs correspondants</label>
							</br>

							<label>A </label>
							<input type="text" id="lieu" name="lieu" maxlength="20" size="20" class="case"/>
							<label> Le </label>
							<input type="text" id="date" name="date" maxlength="20" size="20" class="case"/>
							</br>
							<label>Signature du b&eacuten&eacutevole</label>
							<textarea id="signature" name="signature" rows="4" cols="50" class="case"> </textarea>
						</fieldset>

						<fieldset style="background-color:pink;" class="separateur"><legend class="legende">Partie r&eacuteserv&eacutee à l'association</legend>
							<label>N° d'ordre Reçu :</label>
							</br>
							<label>Remis le :</label>
							</br>
							<label>Signature du tr&eacutesorier :</label>
							</br>
						</fieldset>

						<a href="javascript:window.print()"><img src="../../images/click-here-to-print.jpg" alt="print this page" id="print-button" /></a>
						<input class="btnvalid" type="submit" id="envoie" name="boutonValider" value="Envoyer" />
			         	<input class="btnvalid" type="reset" id="annule" name="boutonAnnuler" value="Annuler" />
			         	<a class="btnvalid" href="javascript:history.go(-1)">Retour</a>

					</form>
				</td>
			</tr>
		</table>
	</div>

<?php
	//include("footer.html");
?>

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
