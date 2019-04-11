<?php
	include('header.php'); 	
?>

	</br>
	</br>	

<!-- Affichage de la bannière -->
	<div class="formulaire"> 

		<table class="form">
			<tr>
				<td>	<!--REDIRIGIRE VERS UNE PAGE QUI ENREGISTRER LES INFORMATIONS SAISIES-->
					<form name="inscription" action="nouveau_frais_enregistrement.php" method ="post" onsubmit="javascript: return verifSaisie();">
					</br></br>

						<fieldset class="separateur"><legend class="legende">Nouvelle note de frais</legend>
							</br></br></br>
						    <label>Je soussigné(e)</label>
						    </br>
						    <input type="text" placeholder="Nom"   id="email" name="email" maxlength="60" size="110" class="case" readonly="readonly" Value="<?php ?>" />		
						    </br>
						    <label>demeurant</label>
							</br>
						    <input type="text" placeholder="ex: 12 rue de Marron, 54600 Villers lès Nancy" id="ville" name="ville" maxlength="60" size="110" class="case" />
						    </br>	
						    <label>certifie renoncer au remboursement des frais ci-dessous et les laisser à l'association</label>
						    </br>
							<input type="text" placeholder="association" id="association" name="association" maxlength="20" size="110" class="case" />
							</br>
							<label>en tant que don.</label>
							</br></br></br>

							<!-- Informations liées à la table lignes_frais-->
							<label>Date</label></br>
							<input type="text" placeholder="date" id="date" name="date" maxlength="20" size="110" class="case" />
							</br>
							<label>Motif</label></br>

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


							</br>
							<label>Trajet</label></br>
							<input type="text" placeholder="Trajet " id="trajet" name="trajet" maxlength="20" size="110" class="case" />
							</br>
							<label>KM</label></br>
							<input type="text" placeholder="KM" id="KM" name="KM" maxlength="20" size="110" class="case" />
							</br>
							<label>Coût Péage</label></br>
							<input type="text" placeholder="Cout Péage" id="cout_peage" name="cout_peage" maxlength="20" size="110" class="case" />
							</br>
							<label>Coût Repas</label></br>
							<input type="text" placeholder="cout_repas" id="cout_repas" name="cout_repas" maxlength="20" size="110" class="case" />
							</br>
							<label>Coût Hebergement</label></br>
							<input type="text" placeholder="cout_hebergement" id="cout_hebergement" name="cout_hebergement" maxlength="20" size="110" class="case" />
							</br>
						      	
						</fieldset>


			  			<input class="btnvalid" type="submit" id="envoie" name="boutonValider" value="Envoyer" />
			         	<input class="btnvalid" type="reset" id="annule" name="boutonAnnuler" value="Annuler" />
					</form>
				</td>
			</tr>
		</table>
	</div>

<?php
	include("footer.html");
?>
