<?php
	$_SESSION['connecte'] = "";
	include_once('header.php');
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

<div id="wrapper">
	<div class="row justify-content-center">
		<div class="card col col-sm-10 col-md-6 col-lg-5 col-xl-3" style="margin-top : 200px;">
			<!-- Card de connexion -->
			<div class="card-body">
				<h4 class="card-title mb-4">Connexion</h4>
				<?php
					if (isset ($_GET['msg']))
					{
						if($_GET['msg']==1)
						{
				?>
						<!-- Alerte en cas de création de compte -->
						<div class="alert alert-success" role="alert" id="alertsuccess" >Votre compte a bien été enregistré !</div>
				<?php
						}
					}
				?>
				<!--formulaire -->
				<div class="form-body">
					<form method="post" action="connexionBdd.php" name="identification">
						<div class="input-group flex-nowrap">
							<div class="input-group-prepend">
								<span class="input-group-text"  style="width : 125px;" id="addon-wrapping">Identifiant</span>
							</div>
							<input id="identifiant" name="identifiant" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" required>
						</div>

						<div class="mt-2 input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" style="width : 125px;" id="inputGroup-sizing-default">Mot de passe</span>
							</div>
							<input id="mdp" name="mdp" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
						</div>

						<input class="mr-4 btn btn-info" type="submit" name="seConnecter" Value="Connexion"/>
						<a class="btn btn-success" href="inscription.php">Inscription</a>
					</form>
				</div> <!-- fin formulaire -->
			</div> <!-- fin card -->
		</div>
	</div>
</div> <!-- end wrapper -->
</body>
</html>
