<?php
	// Définitions de constantes pour la connexion à MySQL
	/*$SERVEUR = 'mledfjbodqbddm2l.mysql.db'; 
	$BASE = 'mledfjbodqbddm2l';
	$NOM = 'mledfjbodqbddm2l';
	$MOTPASSE = '12f4qds90iY';*/

	$SERVEUR = 'localhost'; 
	$BASE = 'bddm2l';
	$NOM = 'root';
	$MOTPASSE = '';


	// Connexion à la base de données
	try {
			$connexion= new PDO("mysql:host=".$SERVEUR.";dbname=".$BASE,$NOM,$MOTPASSE) ;

	} catch ( Exception $e ) {
		  die ("\n Connection à ".$SERVEUR." impossible :  ".$e->getMessage());
	}
?>
