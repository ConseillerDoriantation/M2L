<?php

	session_start();
	$_SESSION['ok']="non";
	header('Location: index.php');
	
?>
