<?php
	include_once("../include/pageaccess.php");
?>
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
    <table class="table" width="50%" height="92" border="0" align="right">
                  <tr>
                    <td height="39"><a href="richtperpersoon.php">Ingeschreven leden per richting weergeven.</a></td>
                  </tr>
                  <tr>
                    <td height="47"><a href="Tests/01simple-download-xlsx.php">Excel bestand downloaden van ingeschreven leden per richting.</a></td>
                  </tr>
                  <tr>
                    <td height="47"><a href="richtingtoevoegen.php">Richting toevoegen in de database.</a></td>
                  </tr>
                </table>
            <div id="banner">
            <p><strong>Welkom in het administratie gedeelte !</strong></p>
                            
                <p><img class="img" src="../images/tandwielen.jpg" width="359" height="270" >                
                <p><strong>Een richting aanpassen, verwijderen of toevoegen klik op de passende icoontjes:</strong></p>
                                  
                  
                  <?php
				include("../include/connectie.php");
				
				$queryrichting = "SELECT * FROM tblrichtingen WHERE RichtingID<20";
	
				$resultRichting = mysql_query($queryrichting)
					  or die(mysql_error());
					  
				//lus starten, rijen herhalen zolang er richtingen
				//in de database zitten
				
				while($row = mysql_fetch_array($resultRichting))
				{
				$richtingID =$row['RichtingID'];
				$richting =$row['Richting'];
		
				?>
                  
                <table align="left" width="50%">
                <tr>
  	<td width="11%"><a href="richtingwissen.php?richtingID=<?php echo $richtingID ?>" onclick="return confirm('Ben je zeker dat je deze richting wilt wissen?')"><img src="../images/delete.png" width="16" height="16" title="Richting wissen"></a></td>
    
    <td width="12%"><a href="richtingenupdaten.php?richtingID=<?php echo $richtingID ?>"><img src="../images/update.png" width="16" height="16" title="Richting aanpassen"></a></td>
    
     <td width="77%"><?php echo $richting ?></td>
  </tr>

<?php //lus ophalen richtingen sluiten
	}
?>
</table>

<?php 			
			
				$queryrichting = "SELECT * FROM tblrichtingen WHERE RichtingID>20";
	
				$resultRichting = mysql_query($queryrichting)
					  or die(mysql_error());
					  
				//lus starten
				while($row = mysql_fetch_array($resultRichting))
				{
				$richtingID =$row['RichtingID'];
				$richting =$row['Richting'];
		
				?>
                <table align="right" width="50%">
                <tr>
  	<td width="10%"><a href="richtingwissen.php?richtingID=<?php echo $richtingID ?>" onclick="return confirm('Ben je zeker dat je deze richting wilt wissen?')"><img src="../images/delete.png" width="16" height="16" title="Richting wissen"></a></td>
    
    <td width="9%"><a href="richtingenupdaten.php?richtingID=<?php echo $richtingID ?>"><img src="../images/update.png" width="16" height="16" title="Richting aanpassen"></a></td>

     <td width="73%"><?php echo $richting ?></td>
  </tr>

<?php //lus ophalen broodjes sluiten
	}
?>
</table>
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