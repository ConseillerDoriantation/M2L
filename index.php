<?php
	$_SESSION['connecte'] = "";
?>

<head>
	<title> M2L_CONNEXION </title>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

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
