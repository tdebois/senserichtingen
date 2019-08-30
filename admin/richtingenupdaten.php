<?php
	include_once("../include/pageaccess.php");
?>
<?php

	//include met connectie toevoegen
	include_once "../include/connectie.php";
	
	//richtingID uit url uitlezen
	$richtingID=$_GET['richtingID'];

	// controleer of een actie werd doorgestuurd
	// indien niet terugsturen naar de algemen index	
	if (isset($_GET['richtingID']) and !empty($_GET['richtingID']))
	{
	$richtingID= $_GET['richtingID'];
	}
	else
	{
	header('location:richtinglijst.php');
	exit();
	}

	//query opbouwen
	$queryupdate= "SELECT * FROM tblrichtingen WHERE RichtingID = " . $richtingID;
	
	$resultsupdate = mysql_query($queryupdate) or die (mysql_error());
		
	//gegevens ophalen
	while($row = mysql_fetch_array($resultsupdate))
	{
		$richting = $row['Richting'];
		
	}

?>
</html>
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

        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/app.css">
        <script src="../js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <img src="../images/sense.png" alt="Logo Sense">
       			</div>
                <div id="nav">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="admin.php">Admin</a></li>
                    </ul>
                </div>
            </div>
            <div id="banner">
            <p><strong>Een nieuwe richting toevoegen aan de database:</strong></p>
            <?php
			//connectie toevoegen
			include_once("../include/connectie.php");
			
			
	//als de verzend knop is aangeduid			
	if(isset($_POST['verzend']))
{	
	//geg ophalen
	$richting=$_POST['richting'];
	
	//query geg invoegen
	$queryadd = " INSERT INTO tblrichtingen (
					Richting) 
			VALUES ('" . $richting . "')";
		
		// uitvoeren van de query
		mysql_query($queryadd) or die (mysql_error());
		
			echo $richting;
	echo " is met succes toegevoegd aan de database";
	echo "</br>";
	echo "</br>";
	//knop weergeven om trg te gaan naar de vorige pagina
	echo '<a href="richtingtoevoegen.php"><input name="knop" value="Terug!" type="button"></a>';
	
}
else
{
?>
              <form action="mngAdmin.php?action=upd&richtingID=<?php echo $richtingID; ?>" method="post">
                <p>Naam richting:
  <input type="text" name="richting" size="60" value="<?php echo $richting; ?>"/>
  </p><input type='submit' name="verzend" value="Richting updaten !" /><p>
  <?php
  echo '<a href="richtinglijst.php"><input name="knop" value="Terug!" type="button"></a>';
}
?>
                
                
                  
                </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
              </form>      
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
            <img src="../images/sensepic.jpg" alt="Afbeelding Sense">
                <!--  footer -->
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>