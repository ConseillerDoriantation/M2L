<?php
	include('header.php');
	if (strpos($_SESSION['connecte'], '@') == false) {
		header('Location: index.php');
	}
?>

<!-- Affichage de la bannière -->
<div id="wrapper">
	<div>
		<div class="row justify-content-center" id="logo">
			<img src="images/logo.png"/>
		</div>
		<!--SLIDE D IMAGE-->
		<div class="sliberbox">
				<div id="slider">
					<div id="box">
						<img class='img1' src="images/a.jpg">
					</div>

					<label class="prew" onclick="prewImage()">  </label>
					<label class="next" onclick="nextImage()">  </label>
				</div>
			</div>
			<!--JAVA Fontions d affichage des images Suivante et Precédente--> 
			<script type="text/javascript">
				var slider_content = document.getElementById("box");
				var image = ["images/a","images/b","images/c"];

				var i= image.length;

				function nextImage(){
					if (i<image.length){
						i=i+1;
					}else{
						i = 1;
					}
					slider_content.innerHTML = "<img class='img1' src="+image[i-1]+".jpg >";
				}

				function prewImage(){
					if (i<image.length+1 && i>1){
						i=i-1;
					}else{
						i = image.length;
					}
					slider_content.innerHTML = "<img class='img1' src="+image[i-1]+".jpg>";
				}

				setInterval(nextImage , 6000);
			</script>
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<div class="divimg">
						<a class="" href="nouveau_frais.php" title="Nouvelle ligne de frais">
							<span class="hover">
								VISIT WEBSITE <i class="icon ion-md-log-out"></i>
							</span>
							<img class="img-fluid" src="/uploads/design/2013-09/axelboberg-se-8773-2.png" alt="">
						</a>
					</div>
				</div>
				<div class="col-sm">
					One of three columns
				</div>
				<div class="col-sm">
					One of three columns
				</div>
			</div>
		</div>
	</div>
	<a href="nouveau_frais.php" style="background-color: #A6AFAE;" class="btn_index">Nouveau Frais</a>

	<a href="liste_frais.php" class="btn_index">Consulter Frais</a>

	<a href="pdf_frais.php" style="background-color: #A6AFAE;" class="btn_index">Demande de frais</a>
</div><!--Fin wrapper-->
</body>
</html>
