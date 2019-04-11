<?php
	$_SESSION['connecte'] = "";
	include('header.php');
?>

<script type="text/javascript">
	function verifChamps()
	{
		if ((document.getElementById('identifiant').value=='') ||(document.getElementById('mdp').value==''))
 		{
			alert("Remplir tous les champs");
			return false;
		}
		return true;
	}

</script>

<!-- Affichage de la bannière -->
<div class="connexionFond">
	<div class="connexionForm">
	<form method="post" action="ConnexionBdd.php" name="identification" onSubmit="return verifChamps()">

		<table class="sansBordure">
		  <tr>
				<td><p>Identifiant</p></td>
				<td><p>:</p></td>
				<td><input type="text" name="identifiant" id="identifiant" size="40" maxlength="50"></td>
		  </tr>
		  <tr>
				<td><p>Mot de passe</p></font></td>
				<td><p>:</p></td>
				<td><input type="password" name="mdp" id="mdp" size="40" maxlength="50"></td>
		  </tr>
		  <tr>
				<td></td>
				<td></td>
				<td><input type="submit" name="seConnecter" value="Connexion">&nbsp;&nbsp;<a href="Inscription.php">Inscription</td>
		  </tr>
		</table>

	</form>
	</div>
</div>

<?php
	//include("footer.html");
?>
