<?php
	include_once('header.php');
?>

<div id="wrapper">
	<div class="row justify-content-center">
		<div class="card col col-sm-10 col-md-6 col-lg-5 col-xl-3" style="margin-top : 200px;">
			<div class="card-body">
				<h4 class="card-title mb-4">Inscription</h4>
				<?php
					if (isset ($_GET['msg']))
					{
						if($_GET['msg']==2)
						{
				?>
						<!-- Alerte en cas de création de compte -->
						<div class="alert alert-danger" role="alert" id="alertsuccess" >L'adresse mail est déjà utilisé !</div>
				<?php
						}
					}
				?>
				<div class="inscriptionForm">
					<form method="post" action="inscriptionBdd.php" name="inscription">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>Email</label>
								<input type="email" class="form-control" id="adrMel" name="adrMel" placeholder="Email" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Mot de passe</label>
								<input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de Passe" onchange="checkPassword()" required>
							</div>
							<div class="form-group col-md-6">
								<label>Confirmation mot de passe</label>
								<input type="password" class="form-control" id="mdpConfirm" name="mdpConfirm" placeholder="Mot de Passe" onchange="checkPassword()" required>
							</div>
						</div>
						
						<!-- Alerte en cas d'erreur mot de passe -->
						<div class="alert alert-danger" role="alert" id="alertPwd">
						</div>

						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Nom</label>
								<input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
							</div>
							<div class="form-group col-md-6">
								<label>Prenom</label>
								<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" required>
							</div>
						</div>


						<div class="form-group">
							<label>Adresse</label>
							<input type="text" class="form-control" id="rue" name="rue" required>
						</div>
						<div class="form-row">
							<div class="form-group col-md-8">
								<label>Ville</label>
								<input type="text" class="form-control" id="ville" name="ville">
							</div>

							<div class="form-group col-md-4">
								<label>Code Postal</label>
								<input type="text" class="form-control" id="cp" name="cp">
							</div>
						</div>

						<input class="mr-4 btn btn-info" type="submit" name="sInscrire" Value="Inscription" id="sInscrire" />
						<a class="btn btn-success" href="index.php">Retour</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> <!-- end wrapper -->
<script>  
	// Function to check Whether both passwords 
	// is same or not. 
	var alertPwd = document.getElementById("alertPwd");
	alertPwd.style.display = 'none';

	function checkPassword() { 
		var password1 = document.getElementById("mdp");
		var password2 = document.getElementById("mdpConfirm");
		var subbtn = document.getElementById("sInscrire");

		if(password1.value != '' && password1.value.length < 8){
			alertPwd.style.display = 'block';
			alertPwd.innerHTML = "Le mot de passe doit contenir au moins 8 charactères";
			subbtn.classList.add("disabled");
			return 0;
		}
		
		// If Not same return False.     
		if(password1.value != '' && password2.value != ''){
			if (password1.value != password2.value) { 
				alertPwd.style.display = 'block';
				alertPwd.innerHTML = "Les deux mots de passes doivent être identiques";
				subbtn.classList.add("disabled");
				return 0;
			} 
		}
		

		// If same return True. 
		alertPwd.style.display = 'none';
		subbtn.classList.remove("disabled");
	} 
</script> 