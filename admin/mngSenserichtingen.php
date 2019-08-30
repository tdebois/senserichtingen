<?php
////////////////////////////////////
////////// BEHEER PERSONEN /////////
////////// EN RICHTINGEN  //////////
////////////////////////////////////

//sessie's starten
session_start();

//connectie toevoegen
include_once "../include/connectie.php";
include_once "../include/formvalidatie.php";

// controleer of een actie werd doorgestuurd
// indien niet terugsturen naar de algemen index	
if (isset($_GET['action']) and !empty($_GET['action']))
{
	$action= $_GET['action'];
}
else
{
	header('location:../index.php');
	exit();
}

/////////////////////////////////
//////// case uitbouwen /////////
/////////////////////////////////

switch ($action)
{
	/////////////////////////////
	//// toevoegen leerling ////
	////////////////////////////

	
	case 'add':
		// gegevens uit form inlezen
		$familienaam = $_POST['Familienaam'];
		$voornaam = $_POST['Voornaam'];
		$straat = $_POST['Straat'];
		$nr = $_POST['Nummer'];
		$bus = $_POST['Bus'];
		$postcode = $_POST['Postcode'];
		$gemeente = $_POST['Gemeente'];
		$telefoon = $_POST['Telefoon'];
		$email = $_POST['Email'];	
		
		
		//formvalidatie via functions (include)
		isempty($familienaam,'familienaam');
		isempty($voornaam,'voornaam');
		
		if(!empty($email)){
			ismail($email);
		}
		
		istext($straat,'straat',0);
		istext($gemeente,'gemeente',0);
		
		
		isnumeric($bus,'bus',0); // 1 = verplicht, 0 = mag leeg zijn;
		isnumeric($nr,'nr',0);
		isnumeric($postcode,'postcode',0);
		
		
		
		
		//array message koppelen aan session
		// session error beschikbaar stellen op andere pagina's
		$_SESSION['error']= $message;
		
		if ($_SESSION['error'])
		{
			 $_SESSION['Familienaam']=$familienaam;
			 $_SESSION['Voornaam']=$voornaam;
			 $_SESSION['Straat']=$straat;
			 $_SESSION['Nr']=$nr;
			 $_SESSION['Bus']=$bus;
			 $_SESSION['Postcode']=$postcode;
			 $_SESSION['Gemeente']=$gemeente;
			 $_SESSION['Telefoon']=$telefoon;
			 $_SESSION['Email']=$email;
			
			header('location:../index.php');
			exit();
		}
		
		//personen invoegen in de database
		$queryadd = " INSERT INTO tblpersonen (
					Voornaam,
					Familienaam,
					Straat,
					Nummer,
					Bus,
					Postcode,
					Gemeente,
					Telefoon,
					Email) 
			VALUES ('" . $voornaam . "',
					'" . $familienaam . "',
					'" . $straat . "',
					'" . $nr . "',
					'" . $bus . "',
					'" . $postcode . "',
					'" . $gemeente . "',
					'" . $telefoon . "',
					'" . $email . "')";
		
		// uitvoeren van de query
		mysql_query($queryadd) or die (mysql_error());
		
		
		//als men op de knog exporteer klikt
		if(isset($_POST['exporteer'])){
			//selecteer max persoonID als maxpersoonID van tblpersonen
		$querypersonen = 'SELECT MAX(PersoonID) as "MaxPersoonID" FROM tblpersonen';
		$_SESSION['exporteer']=$_POST['exporteer'];
		
		//query uitvoeren
		$resultpersonen = mysql_query($querypersonen)
		or die(mysql_error());
		
		  //lus uitvoeren max persoonID uitlezen
		while($row = mysql_fetch_array($resultpersonen))
		{
			$persoonID =$row['MaxPersoonID'];
			
			
	
		// gegevens uit tblrichtingen inlezen	
		$queryrichting = "SELECT * FROM tblrichtingen ORDER BY RichtingID";
				  
		$resultrichting = mysql_query($queryrichting)
		or die(mysql_error());

			//lus uitvoeren 
		while($row = mysql_fetch_array($resultrichting))
		{
			//geg ophalen
			$richting =$row['Richting'];
			$richtingID=$row['RichtingID'];
			
			//post $richtingID ophalen
			$checkbox= $_POST[$richtingID];
			
			//als $checkbox value is gelijk aan $richting
			if($checkbox == $richting){
				$queryadd = " INSERT INTO tblrichtperpersoon (
					RichtPerPersoon,
					RichtingID,
					PersoonID)
					VALUES ('" . $richting . "',
					'" . $richtingID . "',
					'" . $persoonID . "')";

					// uitvoeren van de query
			mysql_query($queryadd) or die (mysql_error());
					
					
	
		}
			
		}
		
			}				
		}


		
		// terugsturen naar index pagina
		header('location:../index.php');
		exit();
			
}

?>