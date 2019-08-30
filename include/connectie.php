<?php
//connectie maken met de server
$connect = mysql_connect("localhost","root","")
			or die("Je hebt geen verbinding met de database!");

//connectie met de juiste database
mysql_select_db("senserichtingen");	

?>