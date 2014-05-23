<?
include ("cp/r/sql.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Artists - gallery nine5</title>
<meta name="description" content="gallery nine5 - Artists" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<meta name="viewport" content="width=device-width, user-scalable=no">

<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />
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
     <div class="large-12 columns" style="text-align:center;">
     	
     	<?
		$artist_t = "SELECT * FROM `artists` WHERE `mostrar`='1'";
		$artist_q = mysql_query($artist_t);

		while ($data=mysql_fetch_assoc($artist_q)) {
			if($data['cover'] == 0){
					$pic=mysql_fetch_assoc(mysql_query("SELECT `url` FROM `media` WHERE `dep_id`='".$data["id"]."' AND `dep_table`='art' AND `type`='img' AND `mostrar`=1 ORDER BY `id` ASC LIMIT 1"));
				}
				else {
					$pic=mysql_fetch_assoc(mysql_query("SELECT `url` FROM `media` WHERE `id`='".$data["cover"]."'"));
					}
			if ($pic["url"]!="") {
				$src='cp/data/uploads/thumb/'.$pic["url"];
			}else{
				$src='http://placehold.it/200x200&text='.$data["nombre"];
			}
			echo '<div class="large-3 medium-4 small-6 column left">
                     <a href="perfil.php?i='.$data["id"].'">
					 	<img alt="'.$data["nombre"].'" class="small-12" src="'.$src.'">
					 </a>
                     <p class="center"><a href="perfil.php?i='.$data["id"].'">'.$data["nombre"].'</a></p>
                </div>';
		}
		?>

     </div>
       
   </div> 

</div>
<div class="large-12">&nbsp;</div>
<? include ("html/htmlchunks/footer.php"); ?>


</div>
</body>
</html>