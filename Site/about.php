<?php 
	include("cp/r/sql.php");
	include("cp/r/funciones.php");
	$abt="SELECT * FROM `aboutus` WHERE `id`='1'";
	$abq=mysql_query($abt);
	$abd=mysql_fetch_assoc($abq);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About - gallery nine 5</title>
<meta name="description" content="gallery nine5 - gallery nine5 is a vital space for groundbreaking artists to exhibit their work in the epicenter of the art world. Committed to the exploration of contemporary art, the gallery stages exhibitions that examine the work of a distinct array of international artists." /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<meta name="viewport" content="width=device-width, user-scalable=no">

<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />
</head>

<body id="aboutUs">
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
     <div class="large-12 column" style="margin-bottom:20px">
     	<ul id="slider" data-orbit>
      	<?
				$st="SELECT * FROM `media` WHERE `media`.`dep_table`='sld' AND `media`.`dep_id`='2'";
				$sq=mysql_query($st);
				while($sd=mysql_fetch_assoc($sq)){
					echo "<li><img src='http://gallerynine5.com/cp/data/uploads/slide/".$sd["url"]."' alt='".$sd["titulo"]."' /></li>";
				}
				?>
      </ul>
     </div>
     <div id="colinfo" class="large-8 medium-8 small-12 column contenido">
     	<?=formattext($abd["info"])?>
     </div>
     <div id="colstaff" class="large-4 medium-4 small-12 column ">
     	<div>
        <?=formattext($abd["staff"])?>
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
$(document).foundation({
  orbit: {
    animation: 'fade',
    timer_speed: 5000,
    pause_on_hover: false,
    animation_speed: 500,
    navigation_arrows: false,
	slide_number: false,
    bullets: false,
    next_on_click: true,
	timer: true	
  }
});
</script>
</div>
</body>
</html>