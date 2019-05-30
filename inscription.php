<?php
	include('header.php');
?>

<div class="inscriptionFond">
	<div class="inscriptionForm">
		<form method="post" action="inscriptionBdd.php" name="inscription" onSubmit="return verifChamps()">
			<table>
			  <tr>
					<td><p>Adresse e-mail</p></td>
					<td><p>:</p></td>
					<td><input type="text" name="adrMel" id="adrMel" size="40" maxlength="50"></td>
			  </tr>
			  <tr>
					<td><p>Nom</p></td>
					<td><p>:</p></td>
					<td><input type="text" name="nom" id="nom" size="40" maxlength="50"></td>
			  </tr>
			  <tr>
					<td><p>Prenom</p></td>
					<td><p>:</p></td>
					<td><input type="text" name="prenom" id="prenom" size="40" maxlength="50"></td>
			  </tr>
			  <tr>
					<td><p>Ville</p></td>
					<td><p>:</p></td>
					<td><input type="text" name="ville" id="ville" size="40" maxlength="50"></td>
			  </tr>
			  <tr>
					<td><p>Rue</p></td>
					<td><p>:</p></td>
					<td><input type="text" name="rue" id="rue" size="40" maxlength="50"></td>
			  </tr>
			  <tr>
					<td><p>Code postal</p></td>
					<td><p>:</p></td>
					<td><input type="text" name="cp" id="cp" size="40" maxlength="50"></td>
			  </tr>
			  <tr>
					<td><p>Mot de passe</p></font></td>
					<td><p>:</p></td>
					<td><input type="password" name="mdp" id="mdp" size="40" maxlength="50"></td>
			  </tr>
			  <tr>
					<td><p>Confirmer</p></font></td>
					<td><p>:</p></td>
					<td><input type="password" name="mdpConfirm" id="mdpConfirm" size="40" maxlength="50"></td>
			  </tr>
			  <tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="sInscrire" value="Inscription">&nbsp;&nbsp;&nbsp;<a href="index.php">Retour</td>
			  </tr>
			</table>
		</form>
	</div>
</div>
