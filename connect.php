<?php   
	// Récupération des informations pour  la connexion à MySQL
	$hote="localhost";
	$login="root";
	$password="";
	$db_name="mlr5";

	// Connexion au serveur
	try 
	{
		$connexion = new PDO ("mysql:host=$hote;dbname=$db_name",$login,$password);
		$req = "SET NAMES utf8";
		$connexion->query($req);
	} 

	catch (Exception $e) 
	{
		die("\n Connexion à '$hote' impossible : ".$e->getMessage());  
	}
?>
