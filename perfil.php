<?
include ("cp/r/sql.php");
include ("cp/r/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery nine 5</title>
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />
</head>

<body id="perfil">
	<div class="large-12 max900">
     <div class="row">
            <div class="large-4 column logo" >  <a href="index.php"><h1><img src="Img/logofinal1.png" /></h1></a>
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
     			<div class="large-6 column ">
					<?
                    $id=mysql_real_escape_string($_GET["i"]);
                    $ar_t = "SELECT * FROM `artists` WHERE `id`='$id'" ;
                    $ar_q = mysql_query($ar_t);
                    $ar_d = mysql_fetch_assoc($ar_q);
                    ?>
                    <h2><?=$ar_d["nombre"]?></h2>
                    <div class="texto readMore" >
                    <?= formattext($ar_d["descripcion"])?>
                    </div>                
                </div>
                <div class="large-6 column">
                	<?
                    $pi_t = "SELECT * FROM `media` WHERE `dep_id`='$id' AND `dep_table`='art'" ;
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
                     <a href="gallery.php?t=art&i=<?=$id?>">Selected Artworks</a>
                </div>

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
            </div>  <div class="large-12 column">
            
                    <div class="  small-6 small-push-3  ">Sign up for newsletter</div>
                  <div class="small-6 small-push-3 "><form  id="newsletter" action="#submit"><input name="Email" class="small-10 medium-10 left" placeholder="Enter your email address" /><input type="submit" value="ok" class="small-2 medium-2 left" /></form></div>
           </div>
         
         </div>
         <div class="large-12 column">©2013 gallery nine5 Copyright.All rights reserved.</div>
      </div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/foundation.min.js"></script>

<script>  
$(document).foundation({
  orbit: {
    animation: 'fade',
    timer_speed: 5000,
    pause_on_hover: true,
	resume_on_mouseout: true,
    animation_speed: 500,
    navigation_arrows: false,
    bullets: true,
    next_on_click: true,
	slide_number: false,
	variable_height: true,
	timer: true
  }
});
</script>
<script>

	  $(document).ready(function(){
		  readmore('.readMore');
		  
		  function readmore (sel) {
			  var maxHeight = 500;
			  $(sel).each(function(){
				  var h = $(this).height();
 						if(h>maxHeight){
										  $(this).addClass("viewmorecontent");
										  $(this).parent().append("<a href='#' class='verMas'>Ver mas</a><a href='#' style='display:none' class='verMenos'>Ver menos</a>" );
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

</body>
</html>