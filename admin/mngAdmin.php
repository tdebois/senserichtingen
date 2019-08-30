<?php
	include_once("../include/pageaccess.php");
?>
<?php
///////////////////////////////
/// beheer admin richtingen ///
///////////////////////////////

//paginatoegang controleren
include_once '../include/connectie.php';

// controleer of een actie werd doorgestuurd
// indien niet terugsturen naar de algemen index	
if (isset($_GET['action']) and !empty($_GET['action']))
{
	$action= $_GET['action'];
}
else
{
	header('location:inloggen.php?error=toegang');
	exit();
}

////////////////////////
/// switch uitbouwen ///
////////////////////////

switch ($action)
{	
	//richting updaten
	case 'upd':
		//richtingID uit url uitlezen
		$richtingID=$_GET['richtingID'];
		
		//tekstvakken uitlezen
		$richting = $_POST['richting'];
				
		$queryupd= "UPDATE tblrichtingen
					SET
						Richting = '" . $richting . "'
					WHERE RichtingID = " . $richtingID;
					
		//query uitvoeren
		mysql_query($queryupd) or die(mysql_error());
		
		header('location:richtinglijst.php');
		
		exit();
		
	// in alle andere gevallen naar admin met een error
	default:
		header('location:admin.php?error=toegang');
		exit();
}
	
?>