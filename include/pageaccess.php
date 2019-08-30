<?php

session_start();

////////////////////////////////////
///// controleer toegang pagina ////
////////////////////////////////////

//controleren of sessie's bestaan/aangemaakt zijn
if (!isset($_SESSION['paswoord']) || !isset($_SESSION['naam']))
{
	header('location:admin.php?error=toegang');
	exit();
}

?>