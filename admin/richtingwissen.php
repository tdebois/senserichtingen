<?php
	include_once("../include/pageaccess.php");
?>
<?php

		include_once("../include/connectie.php");
		
//richtingid uit url uitlezen
		$richtingID=$_GET['richtingID'];
		
		//query om richting te wissen
		$querydel = "DELETE FROM tblrichtingen WHERE RichtingID = " . $richtingID;
	
		//query uitvoeren
		mysql_query($querydel) or die (mysql_error());
		
		header('location:richtinglijst.php');
		
		exit();

?>