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
<title><?=$td["nombre"]?> Artwork - Gallery nine 5</title>
<meta name="description" content="gallery nine5 - <?=$td["nombre"]?> Selected Artwork Gallery" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />
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
      <li><a href="artist.php" >ARTIST</a></li>
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
     	<ul class="small-12 clearing-thumbs" data-clearing>
     	<?
		$pi_t = "SELECT * FROM `media` WHERE `dep_id`='$id' AND `dep_table`='$ta'" ;
        $pi_q = mysql_query($pi_t);

		while ($data=mysql_fetch_assoc($pi_q)) {
			
			echo '<li class="large-3 medium-4 small-6 column left" style="margin-bottom:20px; min-height:400px;">
				<a href="cp/data/uploads/box/'.$data["url"].'">
					<img data-caption="'.$data["titulo"].' <br />'.formattext($data["descripcion"]).'" src="cp/data/uploads/thumb/'.$data["url"].'">
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
<footer class="gradient">
	<div class="max900 ">
        <div class="div1 large-3 medium-3 column "><img src="Img/logoFooter.png" /></div>
        <div class=" div2 large-6 medium-6 column ">
         <span>E</span> info@gallerynine5.com <span>T</span> 212 965 9995 <span>F</span> 212 965 9997</div>
        <div class="large-3 medium-3 right   small-12 ">
        	<div class="large-12 large-pull-1 column ">
                <a class="medium-2 " href="https://www.facebook.com/pages/gallery-nine5/111904072492"><img  src="Img/facebook.png " alt="Facebook"/></a>
                <a class="medium-2 " href="https://twitter.com/gallerynine5"><img  src="Img/Twitter.png" alt="Twitter"/></a>
                <a class="medium-2 " href="#"><img  src="Img/Instagram.png" alt="Instagram"/></a>
                <a class="medium-2 " href="#"><img  src="Img/social-1.png" alt="#"/></a>
                <a class="medium-2 " href="#"><img  src="Img/1stdibs.png" alt="1stdibs"/></a>
            </div>  
           <div class="large-12 column">
            
                    <div class="  small-6 small-push-3  ">Sign up for newsletter</div>
                  <div class="small-6 small-push-3 "><form  id="newsletter" action="signtonews.php" method="post"><input name="Email" class="small-10 medium-10 left" placeholder="Enter your email address" /><input type="submit" value="ok" class="small-2 medium-2 left" /></form></div>
           </div>
         
         </div>
         <div class="large-12 column">©2013 gallery nine5 Copyright.All rights reserved.</div>
      </div>
</footer>

	<script type="text/javascript" src="cp/r/js/foundation.min.js"></script>
    <script>
    	$(document).foundation();
    </script>
</div>
</body>
</html>