<?php 
	include("cp/r/sql.php");
	include("cp/r/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>gallery nine5</title>
<meta name="description" content="gallery nine5 - gallery nine5 is a groundbreaking gallery where eclectic sources of unique, inspiring and important artworks converge&#8230;" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />

</head>
<body id="home">
<div id="container">
	<div class="large-12 max900">    
         <div class="row">
                    <div class="large-4 column logo">
                     <a href="index.php"><h1><img src="Img/logofinal1.png" /></h1></a>
                    </div>
             <nav class="large-8 column">
              <ul class=" inline-list">
              <li><a href="artist.php" >ARTISTS</a></li>
              <li><a href="exhibitions.php" >EXHIBITIONS</a></li>
              <li><a href="private.php" >PRIVATE</a></li>
              <li><a href="news.php" >NEWS</a></li>
              <li><a href="contacts.php" >CONTACT</a></li>
              <li><a href="about.php" >ABOUT US</a></li>
              </ul>
             </nav>
   		</div>       
   </div>    
</div>

<div id="bg-body">
</div>
   
     
     <!-- great succes -->

<script src="js/jquery.js"></script>
<!--<script src="js/foundation.min.js"></script>-->
<script src="js/bgswitch.js"></script>

<script type="text/javascript">
<?
	$it = "SELECT DISTINCT `media`.`url` as `url`, `media`.`titulo` as `titulo`, `media`.`descripcion` as  `descripcion` FROM `media`, `sld` WHERE `media`.`dep_table`='sld' and `media`.`dep_id`='1' and `sld`.`mostrar`='1' and `media`.`mostrar`='1'";
			$iq = mysql_query($it);
	$images;
	while ($id = mysql_fetch_assoc($iq)){
				$img=$id["url"];
				$alt=$id["titulo"];
				$des=$id["descripcion"];				
				$images.='"cp/data/uploads/slideh/'.$img.'",';
			}
			$images = substr($images, 0, -1);	
?>
var srcBgArray = [ <?=$images?>];

$(document).ready(function() {
  $('#bg-body').bcatBGSwitcher({
    urls: srcBgArray,
    alt: 'Full screen background image',
	timeout: 3000,
	speed: 750
  });
});
</script>
</div>
</body>
</html>