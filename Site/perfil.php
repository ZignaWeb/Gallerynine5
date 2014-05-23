<?
session_start();
include ("cp/r/sql.php");
include ("cp/r/funciones.php");
$id=mysql_real_escape_string($_GET["i"]);
$ar_t = "SELECT * FROM `artists` WHERE `id`='$id'" ;
$ar_q = mysql_query($ar_t);
$ar_d = mysql_fetch_assoc($ar_q);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$ar_d["nombre"]?> - gallery nine5</title>
<meta name="description" content="gallery nine5 - <?=$ar_d["nombre"]?> artist profile and selected work" /> 
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
     <?
	 if ((isset($_SESSION["usr"]) && $ar_d["mostrar"]==2) || $ar_d["mostrar"]==1){
	 ?>
     			<div class="large-6 column link ">
					<?
                    
                    ?>
                    <h2><?=$ar_d["nombre"]?></h2>
                    <div class="texto readMore" >
                    <?= formattext($ar_d["descripcion"])?>
                    </div>                
                </div>
                <div class="large-6 column link" style="line-height:150%;">
                	<?
                    $pi_t = "SELECT * FROM `media` WHERE `dep_id`='$id' AND `dep_table`='art' AND `type`='img' AND `mostrar`=1" ;
                    $pi_q = mysql_query($pi_t);
                    ?>
                	<ul id="slider" data-orbit>
                    	<?
						while($pi_d = mysql_fetch_assoc($pi_q)){
							echo '<li>
                          <img src="cp/data/uploads/thumb/'.$pi_d["url"].'" alt="'.$pi_d["titulo"].'">';
						 	echo '</li>';
						}
						?>
                     </ul>
                     <a href="gallery.php?t=art&i=<?=$id?>" style="margin-top:15px;" class="link">SELECTED ARTWORKS</a>
                     <?
					 $doc_t = "SELECT * FROM `media` WHERE `dep_id`='$id' AND `dep_table`='art' AND `type`='doc' AND `mostrar`='1'" ;
                     $doc_q = mysql_query($doc_t);
					 while ($docs=mysql_fetch_assoc($doc_q)) {
						 echo '<br /><a href="cp/data/uploads/files/'.$docs["url"].'" target="_blank">'.$docs["titulo"].' </a>';
					 }
					 echo "<br/>".formattext($ar_d["links"]);
					 ?>
                </div>
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
    bullets: false,
    next_on_click: true,
	slide_number: false,
	variable_height: true,
	timer: true
  }
});
</script>
<script>

	  $(document).ready(function(){
		  $('#slider').trigger("orbit.stop");
		  readmore('.readMore');
		  
		  function readmore (sel) {
			  var maxHeight = 500;
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
				  $(this).siblings(".viewmorecontent").css({maxHeight:500, overflow:"hidden"});
				  $(this).siblings(".verMas").fadeIn();
			  });
		  });
		  
	  });
</script>
</div>
</body>
</html>