<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/app.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <img src="images/sense.png" alt="Logo Sense">
       			</div>
                <div id="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="admin/admin.php">Admin</a></li>
                    </ul>
                </div>
            </div>
            <div id="banner">
            <?php
	//sessie's starten
	session_start();
	
	//include met connectie toevoegen
	include("include/connectie.php");
	
	if(isset($_SESSION['exporteer'])){
		echo "U heeft met succes uw gegevens toegevoegd aan de databank.";
		echo "</br>";
		echo '<a href="admin/voorbeeld.php"><input name="knop" value="Terug!" type="button"></a>';		
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
		echo "</br>";
	}
	else {
	if(isset($_SESSION['error']))
	{
		///////////////////////////////
		///// form met foutmeldingen //
		///////////////////////////////
		
?>
              <form action="admin/mngSenserichtingen.php?action=add" method="post">
                <p><strong><img src="images/checkbox.png" alt="Logo Sense"  > Ja, ik heb interesse in een Se-n-Se richting!</strong> </p>
                  <p>Bezorg ons uw gegevens en wij geven u graag meer info over de richtingen met uw interesse (zie onderaan).</p>
                    <input class="knop1" type="submit" name="exporteer" id="exporteer" value="Exporteer !" width="100" height="100">
                                 
                <table class="tablepersonen" width="75%" border="0" >
                  <tr>
                    <td>Voornaam</td>
                    <td><input name="Voornaam" type="text" placeholder="Jan" value="<?php echo $_SESSION['Voornaam']; ?>">
                         <?php
	if (isset($_SESSION['error']['voornaam']))
	{
		echo $_SESSION['error']['voornaam'];
	}
	?></td>
                    <td>Familienaam</td>
                    <td><input name="Familienaam" type="text" placeholder="Janssen" value="<?php echo $_SESSION['Familienaam']; ?>">
                         <?php
	if (isset($_SESSION['error']['familienaam']))
	{
		echo $_SESSION['error']['familienaam'];
	}
	?></td>
                  </tr>
                  <tr>
                    <td>Straat</td>
                    <td><input name="Straat" type="text" placeholder="Langstraat" value="<?php echo $_SESSION['Straat']; ?>">
                         <?php
	if (isset($_SESSION['error']['straat']))
	{
		echo $_SESSION['error']['straat'];
	}
	?></td>
                    <td>Nummer</td>
                    <td>
                         <input name="Nummer" type="text" placeholder="vb. 4" value="<?php echo $_SESSION['Nr']; ?>">
                    <?php
	if (isset($_SESSION['error']['nr']))
	{
		echo $_SESSION['error']['nr'];
	}
	?></td>
                  </tr>
                   <tr>
                    <td></td>
                    <td></td>
                    <td>Bus</td>
                    <td><input name="Bus" type="text" placeholder="vb. 2" value="<?php echo $_SESSION['Bus']; ?>">
                         <?php
	if (isset($_SESSION['error']['bus']))
	{
		echo $_SESSION['error']['bus'];
	}
	?></td>
                  </tr>
                  <tr>
                    <td>Postcode</td>
                    <td><input name="Postcode" type="text" placeholder="vb. 3630" value="<?php echo $_SESSION['Postcode']; ?>">
                         <?php
	if (isset($_SESSION['error']['postcode']))
	{
		echo $_SESSION['error']['postcode'];
	}
	?></td>
                    <td>Gemeente</td>
                    <td><input name="Gemeente" type="text" placeholder="Maasmechelen" value="<?php echo $_SESSION['Gemeente']; ?>">
                         <?php
	if (isset($_SESSION['error']['gemeente']))
	{
		echo $_SESSION['error']['gemeente'];
	}
	?></td>
                  </tr>
                  <tr>
                    <td>Telefoon</td>
                    <td><input name="Telefoon" type="text" placeholder="vb. 089556688" value="<?php echo $_SESSION['Telefoon']; ?>">
                         <?php
	if (isset($_SESSION['error']['telefoon']))
	{
		echo $_SESSION['error']['telefoon'];
	}
	?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>E-mail</td>
                    <td><input name="Email" type="text" placeholder="jan.janssen@hotmail.com" value="<?php echo $_SESSION['Email']; ?>">
                         <?php
	if (isset($_SESSION['error']['mail']))
	{
		echo $_SESSION['error']['mail'];
	}
	?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <table width="50%" border="0">
                </br>
                  <tr>
                    <td>* : Is een verplicht veld </td>
                    <td>~ : Moet cijfers zijn geen tekst</td>
                  </tr>
                  <tr>
                    <td>° : Moet tekst zijn geen cijfers</td>
                    <td># : Ongeldig e-mail adres</td>
                  </tr>
                </table>
                  <br>
                  <label>                    </label>
                <table class="tablepersonen" align="left" width="50%" border="0">
                  <?php
				  $queryrichting = "SELECT * FROM tblrichtingen WHERE RichtingID<20 ORDER BY RichtingID";
				  
				  $resultrichting = mysql_query($queryrichting)
					  or die(mysql_error());
					  
					while($row = mysql_fetch_array($resultrichting))
					{
						$richting =$row['Richting'];
						$richtingID =$row['RichtingID'];
						?>
                        
                  <tr>
                    <td>
						<label>
                      <input type="checkbox" name="<?php echo $richtingID ?>" value="<?php echo $richting ?>" id="CheckboxGroup1_7" />
                      <?php echo $richting; ?></label>
					<?php  
						 	echo "</br>";
						
					}
			
				  ?>
                  </td></tr>
                 </table>
                <table class="tablepersonen" align="right" width="50%" border="0">
                  <?php
				  $queryrichting = "SELECT * FROM tblrichtingen WHERE RichtingID>20 ORDER BY RichtingID";
				  
				  $resultrichting = mysql_query($queryrichting)
					  or die(mysql_error());
					  
					while($row = mysql_fetch_array($resultrichting))
					{
						$richting =$row['Richting'];
						$richtingID =$row['RichtingID'];
						?>
                  <tr>
                    <td>
					<label>
                      <input type="checkbox" name="<?php echo $richtingID ?>" value="<?php echo $richting ?>" id="CheckboxGroup1_7" />
                      <?php echo $richting; ?></label>
					<?php  
						 	echo "</br>";
						
					}
			
				  ?></td>
                  </tr>
                </table>
               
              </form>
              
				<?php 
	} else {
		////////////////////////////////////
		//// form zonder foutmeldingen /////
		////////////////////////////////////
	
		?>
               <form action="admin/mngSenserichtingen.php?action=add" method="post">
                <p><strong><img src="images/checkbox.png" alt="Logo Sense"  > Ja, ik heb interesse in een Se-n-Se richting!</strong></p>
                  <p>Bezorg ons uw gegevens en wij geven u graag meer info over de richtingen met uw interesse (zie onderaan).</p>
                    <input class="knop1" type="submit" name="exporteer" id="exporteer" value="Exporteer !" width="100" height="100">
                            
                
               
                <table class="tablepersonen" width="75%" border="0" >
                  <tr>
                    <td>Voornaam</td>
                    <td><input name="Voornaam" type="text" placeholder="Jan" ></td>
                    <td>Familienaam</td>
                    <td><input name="Familienaam" type="text" placeholder="Janssen" ></td>
                  </tr>
                  <tr>
                    <td>Straat</td>
                    <td><input name="Straat" type="text" placeholder="Langstraat"></td>
                    <td>Nummer</td>
                    <td><input name="Nummer" type="text" placeholder="vb. 4"></td>
                  </tr>
                   <tr>
                    <td></td>
                    <td></td>
                    <td>Bus</td>
                    <td><input name="Bus" type="text" placeholder="vb. 2">
                     </td>
                  </tr>
                  <tr>
                    <td>Postcode</td>
                    <td><input name="Postcode" type="text" placeholder="vb. 3630">
                    </td>
                    <td>Gemeente</td>
                    <td><input name="Gemeente" type="text" placeholder="Maasmechelen">
                    </td>
                  </tr>
                  <tr>
                    <td>Telefoon</td>
                    <td><input name="Telefoon" type="text" placeholder="vb. 089556688">
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>E-mail</td>
                    <td><input name="Email" type="text" placeholder="jan.janssen@hotmail.com"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                <p><br>
                  <br>
                  <br>
                  <label>                    </label>
                <table class="tablepersonen" align="left" width="50%" border="0">
                  <?php
				  $queryrichting = "SELECT * FROM tblrichtingen WHERE RichtingID<20 ORDER BY RichtingID";
				  
				  $resultrichting = mysql_query($queryrichting)
					  or die(mysql_error());
					  
					while($row = mysql_fetch_array($resultrichting))
					{
						$richting =$row['Richting'];
						$richtingID=$row['RichtingID'];
						
						?>
                        
                        
                  <tr>
                    <td>
						<label>
                      <input type="checkbox" name="<?php echo $richtingID ?>" value="<?php echo $richting ?>" id="CheckboxGroup1_7" />
                      <?php echo $richting; ?></label>
					<?php  
						 	echo "</br>";
					}
			
				  ?>
                  </td></tr>
                 </table>
                <table class="tablepersonen" align="right" width="50%" border="0">
                  <?php
				  $queryrichting = "SELECT * FROM tblrichtingen WHERE RichtingID>20 ORDER BY RichtingID";
				  
				  $resultrichting = mysql_query($queryrichting)
					  or die(mysql_error());
					  
					while($row = mysql_fetch_array($resultrichting))
					{
						$richting =$row['Richting'];
						$richtingID=$row['RichtingID'];
						?>
                  <tr>
                    <td><label>
                      <input type="checkbox" name="<?php echo $richtingID ?>" value="<?php echo $richting ?>" id="CheckboxGroup1_7" />
                      <?php echo $richting; ?></label>
					<?php  
						 	echo "</br>";
						
					}
			
				  ?></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </form>
              <?php
	}
	}
	?>
                <!-- banner -->
            </div>
            <div id="content">
                <div id="text">
                    <!--   text -->
                                       
                </div>
                <div id="news">
                    <!-- news -->
                </div>
            </div>
            <div id="footer">
            <img src="images/sensepic.jpg" alt="Afbeelding Sense">
                <!--  footer -->
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
