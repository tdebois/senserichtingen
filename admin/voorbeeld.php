<?php
	include("../include/connectie.php");
	
	//sesies starten daarna verwijderen
	session_start();
	session_destroy();
	
	echo "U hebt met succes uw enquête geëxporteerd!";
	//doorsturen naar de index pagina
	header('location:../index.php');
	exit();
?>