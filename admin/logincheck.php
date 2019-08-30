<?php
session_start();
// gegevens uit form uitlezen: POST
	$naam		= $_POST['naam'];
	$paswoord	= $_POST['paswoord'];
	
	$_SESSION['naam']=$naam;
	$_SESSION['paswoord']=$paswoord;
	
	//controleren of de gebruiker toegang heeft tot de pagina
	if ($naam == "admin" && $paswoord == "adminpass")
	{
		header('location:richtinglijst.php');
		exit();
	}
	else
	{
		header('location:admin.php');
		exit();
	}

?>