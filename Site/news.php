<?php 
	include("cp/r/sql.php");
	include("cp/r/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News - gallery nine5</title>
<meta name="description" content="gallery nine5 - News and events" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />
<style>
body#news .exibit > .column:nth-of-type(1) > p:nth-of-type(1){color:#000}
body#news .exibit:nth-of-type(4) div:first-child p:first-child{ color:#f00 !important}
</style>
</head>

<body id="news">
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
			$extra=7;
	$nt = "SELECT * FROM `news` WHERE 1 ORDER BY `creada` DESC LIMIT 16";
	$nq = mysql_query($nt);
	$i = 0;
	while ($nd = mysql_fetch_assoc($nq)){
			$mt = "SELECT * FROM `media` WHERE `dep_table`= 'news' AND `dep_id` = '".$nd["id"]."' AND `mostrar`=1";
			$mq = mysql_query($mt);
			$md = mysql_fetch_assoc($mq);		
		if ($i<3+$extra){
			if (mysql_num_rows($mq)>0){
					$htmlimg = '<div class=" column large-3 medium-3 small-12">
						<img src="cp/data/uploads/thumb/'.$md["url"].'"/>
					</div>';
					$htmlclase = 'column large-9 medium-9 small-12';}
				else {
					$htmlimg = ''; 
					$htmlclase = 'column large-12 medium-12 small-12';
			}
			echo '<div class="exibit">
			<div class="'.$htmlclase.'">
            <h2>'.$nd["titulo"].'</h2>
            <h3>'.fFecha($nd["creada"]).'</h3>
            <p>'.substr($nd["descripcion"],0,500).'</p>
			<a href="newsi.php?i='.$nd["id"].'" class="more">Read more</a>
            </div>
            '.$htmlimg.'
        </div>
        <hr />';
		}			
			elseif($i<6+$extra){
				if ($i==3+$extra ){
						echo '<div class="exibit divfooter">
							  	<div class="column large-12"><p class="rojo">PAST NEWS</p></div>
							  		<div class="column large-6 medium-6 small-12 left">
									<P>'.fFecha($nd["creada"]).'</P>
                    				<P><a href="newsi.php?i='.$nd["id"].'">'.$nd["titulo"].'</a></P>';
					}else
						{
							echo '<P>'.fFecha($nd["creada"]).'</P>
                    			  <P><a href="newsi.php?i='.$nd["id"].'">'.$nd["titulo"].'</a></P>';
						}
					}else if ($i < 9+$extra){
						if ($i == 6+$extra){
							echo '</div>
								  <div class="column large-6 medium-6 small-12 left">
									<P>'.fFecha($nd["creada"]).'</P>
                    				<P><a href="newsi.php?i='.$nd["id"].'">'.$nd["titulo"].'</a></P>';
						} else
						{
							echo '<P>'.fFecha($nd["creada"]).'</P>
                    			  <P><a href="newsi.php?i='.$nd["id"].'">'.$nd["titulo"].'</a></P>';
						} 					
					}
					
					if ((mysql_num_rows($nq)-1)==$i && $i>=3+$extra){
						echo '</div>
							  </div>
							  ';
					}
					
				$i++;
	}
										 
?>
       
     <div class="column large-2 medium-2 small-6 small-pull-3 right center"><p><a href="newsS.php">READ MORE</a></p></div>
   </div> 
</div>

<div class="large-12">&nbsp;</div>
<? include ("html/htmlchunks/footer.php"); ?>


</div>
</body>
</html>