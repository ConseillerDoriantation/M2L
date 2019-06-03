<?php
	include('header.php');
	if (strpos($_SESSION['connecte'], '@') == false) {
		header('Location: index.php');
	}
?>

<div id="wrapper">
	<!-- Logo -->
	<div class="row justify-content-center" id="logo">
		<img src="images/logo.png"/>
	</div>

<!-- slider -->
<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active" data-interval="2000">
			<img src="images/a.jpg" class="d-block w-100">
		</div>
		<div class="carousel-item" data-interval="2000">
			<img src="images/b.jpg" class="d-block w-100">
		</div>
		<div class="carousel-item">
			
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

	<!-- Lien -->
	<div class="row mt-4 mb-4">
		<div class="col-sm-4">
			<div class="card bg-dark text-white">
				<img src="images/liste_frais.jpeg" class="card-img">
				<div class="card-body">
					<h5 class="card-title">Liste des frais</h5>
					<a href="liste_frais.php" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card bg-dark text-white">
				<img src="images/nouveau_frais.jpeg" class="card-img">
				<div class="card-body">
					<h5 class="card-title">Nouvelle ligne de frais</h5>
					<a href="nouveau_frais.php" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card bg-dark text-white">
				<img src="images/frais_pdf.jpeg" class="card-img">
				<div class="card-body">
					<h5 class="card-title">Demande de frais</h5>
					<a href="pdf_frais.php" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
		</div>
	</div><!-- Fin lien -->
</div><!--Fin wrapper-->
</body>
</html>
