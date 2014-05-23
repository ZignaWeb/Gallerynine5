<?php 
	include("cp/r/sql.php");
	include("cp/r/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact - gallery nine5</title>
<meta name="description" content="gallery nine5 - Contact" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />

</head>

<body id="contacts">
<div id="container">
	<div class="large-12 max900">
     <div class="row">
            <div class="large-4 column logo">  <a href="index.php"><h1><img src="Img/logofinal1.png" /></h1></a>
            </div>
     <nav class="large-8 column">
      <ul class=" inline-list  ">
      <li><a href="artist.php" >ARTISTS</a></li>
      <li><a href="exhibitions.php" >EXHIBITIONS</a></li>
      <li><a href="private.php" >PRIVATE</a></li>
      <li><a href="news.php" >NEWS</a></li>
      <li><a href="contacts.php" >CONTACT</a></li>
      <li><a href="about.php" >ABOUT US</a></li>
      </ul>
     </nav>
     <hr>
   	 <div class="columns link">
    	<?
		$dt="SELECT * FROM `contact` WHERE `id`='1'";
		$dq=mysql_query($dt);
		$dd=mysql_fetch_assoc($dq);
		?>
     	<div class="large-4 left texto" style="font-size:14px">
            <?=formattext($dd["info"])?> 
			<hr />     
			<!-- <p>Social Media</p>-->
            
            </div>
        	<div class="large-7 right column ">
            	<img src="Img/New_Site_gallerynine5_Map.jpg" alt="location map" />           <div>   
                <a href="https://plus.google.com/116657886944630875380/about?gl=US&hl=en-419" target="_blank">View GoogleMaps</a>
            </div>    
            </div>
     	</div>
 	</div>          
   </div> 

</div>
<div class="large-12">&nbsp;</div>
<? include ("html/htmlchunks/footer.php"); ?>
<script src="js/jquery.js"></script>
<script src="js/foundation.min.js"></script>

<script>  
$(document).foundation();
</script>
</div>
</body>
</html>