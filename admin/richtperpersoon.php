<?php
	include_once("../include/connectie.php");
			
		
		// gegevens uit het tblrichtingen inlezen	
		$queryrichting = "SELECT * FROM tblrichtingen ORDER BY RichtingID";
				  
		$resultrichting = mysql_query($queryrichting)
		or die(mysql_error());

		//lus starten
		while($row = mysql_fetch_array($resultrichting))
		{
			
			$richting =$row['Richting'];
			$richtingID=$row['RichtingID'];
			
		//selecteer alles van tblpersonen en tblrichtperpersoon waar persoonID van het ene
		//gelijk is aan persoonID van de andere tabel waar richtingID is gelijk aan $richtingID	
		$queryrichtperpersoon = "SELECT tblpersonen.*, tblrichtperpersoon.* FROM tblpersonen 
								INNER JOIN tblrichtperpersoon 
				  				ON  tblpersonen.PersoonID = tblrichtperpersoon.PersoonID
								WHERE tblrichtperpersoon.RichtingID=" . $richtingID;
			?>
			<h3><?php echo "Richting: " . $richting ?></h3>  
		<?php
        $resultrichtperpersoon = mysql_query($queryrichtperpersoon)
		or die(mysql_error());


		while($row = mysql_fetch_array($resultrichtperpersoon))
		{
			$persoonID =$row['PersoonID'];
			$voornaam =$row['Voornaam'];
			$familienaam =$row['Familienaam'];
			$straat =$row['Straat'];
			$nummer =$row['Nummer'];
			$bus =$row['Bus'];
			$postcode =$row['Postcode'];
			$gemeente =$row['Gemeente'];
			$telefoon =$row['Telefoon'];
			$email =$row['Email'];

			echo "Voornaam: " . $voornaam . " " . "Familienaam: " . $familienaam . " " . "Straat: " . $straat . " " . "Nummer: " . $nummer . " " . "Bus: " . $bus . " " . "Postcode: " . $postcode . " " . "Gemeente: " . $gemeente . " " . "Telefoon: " . $telefoon . " " . "E-mail: " . $email;	
				echo "</br>";
			
			
		
}
		}
?>