<?
session_start();
include ("cp/r/sql.php");
include ("cp/r/funciones.php");
$id=htmlentities($_GET["i"]);
$ta=htmlentities($_GET["t"]);
$td = mysql_fetch_assoc(mysql_query("SELECT * FROM `artists` WHERE `id`='$id'")) ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$td["nombre"]?> Artwork - gallery nine5</title>
<meta name="description" content="gallery nine5 - <?=$td["nombre"]?> Selected Artwork Gallery" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<script type="text/javascript" src="cp/r/js/jquery.js"></script>
<script type="text/javascript" src="js/local.js"></script>
</head>

<body id="Artist">
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
     <div class="large-12">
		<?
        if ((isset($_SESSION["usr"]) && $td["mostrar"]==2) || $td["mostrar"]==1){
        ?>
     	<h2><a href="perfil.php?i=<?=$id?>"><?=$td["nombre"]?></a></h2>
        <p>Selected Artworks</p>
     	<ul class="small-12 clearing-thumbs" data-clearing style="margin-top:20px">
     	<?
		$pi_t = "SELECT * FROM `media` WHERE `dep_id`='$id' AND `dep_table`='$ta' AND `mostrar`='1' AND `type`='img'" ;
        $pi_q = mysql_query($pi_t);

		while ($data=mysql_fetch_assoc($pi_q)) {
			
			echo '<li class="thumbfixh">
				<a href="cp/data/uploads/box/'.$data["url"].'">
					<img data-caption="'.$data["titulo"].' <br />'.formattext($data["descripcion"]).'" src="cp/data/uploads/thumbcuad/'.$data["url"].'">
					<p style="line-height:100%"><strong style="margin-top:10px; display:block">'.$data["titulo"].'</strong><span style="margin-top:10px; display:block">'.formattext($data["descripcion"]).'</span></p>
				</a>
			</li>';
		}
		?>
		</ul>
        
        <?
	 	}else{
			echo "This section is private, please <a href='./private.php'>click here to login</a>";
		}
		?>
     </div>
       
   </div> 

</div>
<div class="large-12">&nbsp;</div>
<? include ("html/htmlchunks/footer.php"); ?>

	<script type="text/javascript" src="js/foundation.min.js"></script>
    <script>
    	$(document).foundation();
    </script>
</div>
</body>
</html>