<?
session_start();
$usr = "catalina95";
$psw = "newyork21";
if ($_POST) {
	if ($_POST["usr"]==$usr && $_POST["psw"]==$psw){
		$_SESSION["usr"] = $_POST["usr"];
		$msje="Login ok";
	}else{
		$msje="Wrong username or password";
	}
}
include ("cp/r/sql.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Private - gallery nine5</title>
<meta name="description" content="gallery nine5 - Private art selection" /> 
<link rel="icon" type="image/ico" href="http://www.gallerynine5.com/favicon.ico" /> 
<link rel="shortcut icon" href="http://www.gallerynine5.com/favicon.ico" />
<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="CSS/css.css" rel="stylesheet" type="text/css" />
<link href="CSS/zigna.css" rel="stylesheet" type="text/css" />

</head>

<body id="private">
<div id="container">
	<div class="large-12 max900">
     <div class="row">
            <div class="large-4 column logo"><a href="index.php"><h1><img src="Img/logofinal1.png" /></h1></a></div>
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
     <hr />
    <!-- CONTENIDO -->
    
    	<?
		if (isset($_SESSION["usr"])){
			include("html/private_content_list.php");
		}else{
			include("html/private_login.php");
		}
		?>
     	
    <!-- endCONTENIDO -->   
   </div> 

</div>
<div class="large-12">&nbsp;</div>
<? include ("html/htmlchunks/footer.php"); ?>
<script src="js/jquery.js"></script>
<script src="js/foundation.min.js"></script>

<script>  
$(document).foundation();
</script>
</div>
</body>
</html>