<?
include ("cp/r/sql.php");
include ("cp/r/funciones.php");
$id=mysql_real_escape_string($_GET["i"]);
$ar_t = "SELECT * FROM `news` WHERE `id`='$id'" ;
$ar_q = mysql_query($ar_t);
$ar_d = mysql_fetch_assoc($ar_q);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$ar_d["titulo"]?> - gallery nine5</title>
<meta name="description" content="gallery nine5 - News: <?=$ar_d["titulo"]?>" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />

</head>

<body id="perfil">
<div id="container">
	<div class="large-12 max900">
     <div class="row">
            <div class="large-4 column logo" >  <a href="index.php"><h1><img src="Img/logofinal1.png" /></h1></a>
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
     			<div class="large-6 column link ">
					<?
					
					echo '<h2>'.$ar_d["titulo"].'</h2>
						<h3>'.fFecha($ar_d["creada"]).'</h3>
						<div class="texto">
						<p>'.formattext($ar_d["descripcion"]).'</p>
						</div>';
                    ?>
                </div>
                <div class="large-6 column">
                	<?
                    $pi_t = "SELECT * FROM `media` WHERE `dep_id`='$id' AND `dep_table`='news' AND `mostrar`=1" ;
                    $pi_q = mysql_query($pi_t);
                    ?>
                	<ul data-orbit>
                    	<?
						while($pi_d = mysql_fetch_assoc($pi_q)){
							echo '<li>
                          <img src="cp/data/uploads/box/'.$pi_d["url"].'" alt="'.$pi_d["titulo"].'">
                        </li>';
						}
						?>
                     </ul>
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
	resume_on_mouseout: false,
    animation_speed: 500,
    navigation_arrows: false,
    bullets: false,
    next_on_click: true,
	slide_number: false,
	variable_height: true,
	timer: false
  }
});
</script>
</div>
</body>
</html>