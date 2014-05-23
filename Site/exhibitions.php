<?php 
	include("cp/r/sql.php");
	include("cp/r/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exhibitions - gallery nine5</title>
<meta name="description" content="gallery nine5 - Exhibitions" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<meta name="viewport" content="width=device-width, user-scalable=no">


<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />
</head>

<body id="exibitions">
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
     	<?php
			$hoy = date("Y-n-j");
			
			// actuales
			$et = "SELECT * FROM `exhibits` WHERE `desde` <= '$hoy' AND `hasta` > '$hoy' AND `mostrar`=1";
			$eq = mysql_query($et);
			while($ed = mysql_fetch_assoc($eq)){
				$at = "SELECT `nombre` FROM `artists` WHERE `id` = '".$ed["artista"]."'";
				$aq = mysql_query($at);
				$ad = mysql_fetch_assoc($aq);
				if ($ed['cover'] == 0){
					$it = "SELECT url FROM media WHERE dep_table='exi' and dep_id='".$ed["id"]."' ORDER BY id ASC LIMIT 1";
				}
				else{
					$it= "SELECT `url` FROM `media` WHERE `id`='".$ed["cover"]."'";
					}
				$iq = mysql_query($it);
				$id = mysql_fetch_assoc($iq);			
				echo '<div class="exibit">
				<div class="column large-6 medium-6 small-12">
				<p>CURRENT</p>
				<h2><a href="exhibition.php?i='.$ed["id"].'">'.$ad["nombre"].'</a></h2>
				<h3><a href="exhibition.php?i='.$ed["id"].'">'.$ed["titulo"].'</a></h3>
				<p>Exhibition: '.fFecha($ed["desde"]).' - '.fFecha($ed["hasta"]).' </p>
				<p>Opening Reception: '.$ed ["opening"].'</p> <br>
				<div class="readMore texto">'.substr($ed["descripcion"],0,1100).' ... </div> 
				<a href="exhibition.php?i='.$ed["id"].'" class="more">Read more</a>
				</div>
				<div class=" column large-6 medium-6 small-12">
					<img src="cp/data/uploads/box/'.$id["url"].'" />
				</div>
			</div>
			<hr />';
				}
			// futuras
			?>
            <div class="exibit">
            <div class="column large-12"><p>FUTURE</p></div>
            <?
			$et = "SELECT * FROM `exhibits` WHERE `desde` > '$hoy' AND `mostrar`=1";
			$eq = mysql_query($et);
			while($ed = mysql_fetch_assoc($eq)){
				$at = "SELECT `nombre` FROM `artists` WHERE `id` = '".$ed["artista"]."'";
				$aq = mysql_query($at);
				$ad = mysql_fetch_assoc($aq);
				if ($ed['cover'] == 0){
				$it = "SELECT url FROM media WHERE dep_table='exi' and dep_id='".$ed["id"]."' ORDER BY id ASC LIMIT 1";
				}
				else{
					$it = "SELECT `url` FROM `media` WHERE `id`='".$ed["cover"]."'";
					}
				$iq = mysql_query($it);
				$id = mysql_fetch_assoc($iq);			
				echo '<div class="small-12 medium-3 columns left" style="text-align:center">
            	<a href="exhibition.php?i='.$ed["id"].'"><img src="cp/data/uploads/thumb/'.$id["url"].'" style="height:150px; width:auto;" /></a>
                <p>'.$ed["titulo"].'</p>
            </div>';
				}
			?>
            </div>
            <hr />
            <div class="exibit past">
            <div class="column large-12">
            	<p><a name="past"> </a>PAST   </p>
                <ol>
                	<? 
					$at= "SELECT YEAR(`desde`) as `anio` FROM `exhibits` WHERE 1 GROUP BY YEAR(`desde`) ORDER BY `anio` DESC";
					$aq= mysql_query($at);
					$i=0;
					
				
				
					
					while($ad=mysql_fetch_assoc($aq)){
						if($i==0){
							$mostrar=$ad['anio'];
							if(!isset ($_GET['a']))$style= 'font-style:italic; color:#F00';
							
						}
						
						if ($_GET["a"]==$ad["anio"]){
							$style= 'font-style:italic; color:#F00';		
							}elseif($i!=0){
								$style=NULL;		
						}
						
					
						echo '<li><a style="'.$style.'" href="?a='.$ad["anio"].'#past">'.$ad["anio"].'</a></li>';
					$i++;
					}
                    
					
					?>
                </ol>
            </div>
            <?
			// pasadas
			
			if (isset ($_GET['a'])){
						$et = "SELECT * FROM `exhibits` WHERE  YEAR(`hasta`) = '".$_GET['a']."' AND `mostrar`=1 AND `hasta` < '".$hoy."' ORDER BY `desde` DESC";
					}else {
							$et = "SELECT * FROM `exhibits` WHERE  YEAR(`hasta`) = '".$mostrar."' AND `mostrar`=1 AND `hasta` < '".$hoy."' ORDER BY `desde` DESC";
							
			}
			$eq = mysql_query($et);
			while($ed = mysql_fetch_assoc($eq)){
				$at = "SELECT `nombre` FROM `artists` WHERE `id` = '".$ed["artista"]."'";
				$aq = mysql_query($at);
				$ad = mysql_fetch_assoc($aq);
				if ($ed['cover'] == 0){
					$it = "SELECT url FROM media WHERE dep_table='exi' and dep_id='".$ed["id"]."'";
				}
				else{
						$it = "SELECT `url` FROM `media` WHERE `id`='".$ed["cover"]."'";
					}
				$iq = mysql_query($it);
				$id = mysql_fetch_assoc($iq);			
				echo '<div class="small-12 medium-3 columns left itempast" style="text-align:center;">
            	<a href="exhibition.php?i='.$ed["id"].'"><img src="cp/data/uploads/thumb/'.$id["url"].'" style="height:150px; width:auto;"/></a>
                <p>'.$ed["titulo"].'</p>
            </div>';
				}
			
		?>
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
    pause_on_hover: true,
    animation_speed: 500,
    navigation_arrows: true,
    bullets: true,
    next_on_click: true,
	
  }
});
</script>
<script>

	  $(document).ready(function(){
		  $('#slider').trigger("orbit.stop");
	  });
</script>
</div>
</body>
</html>