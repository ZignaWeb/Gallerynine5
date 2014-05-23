<?
include ("cp/r/sql.php");
include ("cp/r/funciones.php");
$id=mysql_real_escape_string($_GET["i"]);
$ar_t = "SELECT * FROM `exhibits` WHERE `id`='$id'" ;
$ar_q = mysql_query($ar_t);
$ar_d = mysql_fetch_assoc($ar_q);
$a=$ar_d["artista"];
$nom_t = "SELECT nombre FROM `artists` WHERE `id`='$a'" ;
$nom_q = mysql_query($nom_t);
$nom_d = mysql_fetch_assoc($nom_q);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$ar_d["titulo"]?> - gallery nine5</title>
<meta name="description" content="gallery nine5 - Exhibit: <?=$ar_d["titulo"]?> - From: <?=fFecha($ar_d["desde"])?> - To: <?=fFecha($ar_d["hasta"])?>" /> 
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
     			<div class="large-6 column link">
                    <h3><?=$nom_d["nombre"]?></h3>
                    <h4><?= $ar_d["titulo"]?></h4>
                   <p>Exhibition: <?= fFecha($ar_d ["desde"]). "-".fFecha($ar_d ["hasta"])?> </p>
                   <p>Opening Reception: <?= $ar_d["opening"]?> </p>
                    <div class="texto readMore">
                    <?= formattext($ar_d["descripcion"])?>
                    </div>                
                </div>
                <div class="large-6 column link">
                	<?
                    $pi_t = "SELECT * FROM `media` WHERE `dep_id`='$id' AND `dep_table`='exi' AND `type`!='doc' AND `type`!='' AND `mostrar`=1" ;
                    $pi_q = mysql_query($pi_t);
                    ?>
                	<ul data-orbit>
                    	<?
						while($pi_d = mysql_fetch_assoc($pi_q)){
							echo '<li>
                          <img src="cp/data/uploads/thumb/'.$pi_d["url"].'" alt="'.$pi_d["titulo"].'">
                        </li>';
						}
						?>
                     </ul>
                     <?
					 $doc_t = "SELECT * FROM `media` WHERE `dep_id`='$id' AND `dep_table`='exi' AND `type`!='img' AND `mostrar`=1" ;
                     $doc_q = mysql_query($doc_t);
					 while ($docs=mysql_fetch_assoc($doc_q)) {
						 echo '<br /><a href="cp/data/uploads/files/'.$docs["url"].'" target="_blank">'.$docs["titulo"].'</a>';
					 }
					 echo "<br/>".formattext($ar_d["links"]);
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
    pause_on_hover: false,
	  resume_on_mouseout: true,
    animation_speed: 500,
    navigation_arrows: false,
    bullets: false,
    next_on_click: true,
		slide_number: false,
		variable_height: true,
		timer: true,
		variable_height: false,
  }
});
</script>
<script>

	  $(document).ready(function(){

		  // readmore('.readMore');
		  
		  function readmore (sel) {
			  var maxHeight = 300;
			  $(sel).each(function(){
				  var h = $(this).height();
 						if(h>maxHeight){
										  $(this).addClass("viewmorecontent");
										  $(this).parent().append("<a href='#' class='verMas'>Read more</a><a href='#' style='display:none' class='verMenos'>Less</a>" );
										}
			  });
			  $(sel).css({maxHeight:maxHeight, overflow:"hidden"});
		  }
		  
		  var show = 0;
		  $(".verMas").click(function(event){
			  event.preventDefault();
			  
			  $(this).fadeOut(function(){
				  $(".viewmorecontent").css({maxHeight:"none", overflow:"hidden"});
				  $(this).siblings(".verMenos").fadeIn();
			  });
		  });
		  
		  
		  $(".verMenos").click(function(event){
			  event.preventDefault();

			  $(this).fadeOut(function(){
				  $(this).siblings(".viewmorecontent").css({maxHeight:300, overflow:"hidden"});
				  $(this).siblings(".verMas").fadeIn();
			  });
		  });
		  
	  });
</script>

</div>
</body>
</html>