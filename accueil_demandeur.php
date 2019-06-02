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
	<!-- Caroussel -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
			<img src="images/a.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			<img src="images/b.jpg" class="d-block w-100" alt="...">
			</div>
			<div class="carousel-item">
			<img src="images/c.jpg" class="d-block w-100" alt="...">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div> <!-- Fin Caroussel -->

	<!-- Lien -->
	<div class="row">
		<div class="col-sm-6">
			<div class="card">
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				<a href="#" class="btn btn-primary">Go somewhere</a>
			</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
			<div class="card-body">
				<h5 class="card-title">Special title treatment</h5>
				<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
				<a href="#" class="btn btn-primary">Go somewhere</a>
			</div>
			</div>
		</div>
	</div><!-- Fin lien -->
	
	<a href="nouveau_frais.php" style="background-color: #A6AFAE;" class="btn_index">Nouveau Frais</a>

	<a href="liste_frais.php" class="btn_index">Consulter Frais</a>

	<a href="pdf_frais.php" style="background-color: #A6AFAE;" class="btn_index">Demande de frais</a>
</div><!--Fin wrapper-->
</body>
</html>
