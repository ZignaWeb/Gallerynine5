<?php 
	include("cp/r/sql.php");
	include("cp/r/funciones.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News archive - gallery nine5</title>
<meta name="description" content="gallery nine5 - news and events" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico"></link> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico"></link>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />

<style>
body#news .exibit > .column:nth-of-type(1) > p:nth-of-type(1){color:#000}
body#news .exibit:nth-of-type(4) div:first-child p:first-child{ color:#f00}
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
		$nntotal = mysql_num_rows(mysql_query("SELECT * FROM `news` WHERE 1"));
		$xpag     = 10;
		$pn = ceil($nntotal/$xpag);		
		
		if ($_GET["p"]){
			$p=$_GET["p"];
			$a=$p*$xpag-$xpag;
			$b=$p*$xpag;
			$limit="LIMIT $a,$xpag";
		}else{
			$limit="LIMIT 0,$xpag";
			$p=1;
		}
		
	$nt = "SELECT * FROM `news` WHERE 1 ORDER BY `creada` DESC $limit";
	$nq = mysql_query($nt);
	$nn = mysql_num_rows($nq);
	
	while ($nd = mysql_fetch_assoc($nq)){
			$mt = "SELECT * FROM `media` WHERE `dep_table`= 'news' AND `dep_id` = '".$nd["id"]."' AND `mostrar`=1";
			$mq = mysql_query($mt);
			$md = mysql_fetch_assoc($mq);		
		
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
            <a href="newsi.php?i='.$nd["id"].'"><h2>'.$nd["titulo"].'</h2></a>
            <h3>'.fFecha($nd["creada"]).'</h3>
            <p>'.$nd["descripcion"].'</p>
            </div>
            '.$htmlimg.'
        </div>
        <hr />';
		}			
			
				
	
										 
?>
       
       
   </div> 
   <div class="pagination-centered">
      <ul class="pagination">
		<?
        if ($nntotal>$xpag){
			
            $url=$_SERVER['REQUEST_URI'];
			
            $strpos=strpos($url,"?p=");
                if ($strpos){
                    $url=substr($url,0,$strpos);
                }
            if ($p==1)   {$arrowa="unavailable";$linka="#";}else{$linka=$url.'?p='.($p-1);}
            if ($p==$pn) {$arrowb="unavailable";$linkb="#";}else{$linkb=$url.'?p='.($p+1);}
            
            echo '<li class="arrow '.$arrowa.'"><a href="'.$linka.'">&laquo;</a></li>';
            for ($i=1;$i<=$pn;$i++) {
                if ($i==$p) { $current="current";}else{$current="";}
                echo "<li class='$current'><a href='$url?p=$i'>$i</a></li>";
            }
            echo '<li class="arrow '.$arrowb.'"><a href="'.$linkb.'">&raquo;</a></li>';
        }
        ?>
      </ul>
    </div>
</div>

<div class="large-12">&nbsp;</div>
<? include ("html/htmlchunks/footer.php"); ?>


</div>
</body>
</html>