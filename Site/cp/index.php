<?
include("r/main.php");
$embed=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$title=$site_name;
if ($_GET["a"]) {
	$title.=" ".$secciones[$_GET["q"]]["a"][$_GET["a"]]["t"];
}
if ($_GET["q"]) {
	$title.=" ".$secciones[$_GET["q"]]["t"];
}
?>
<title><?=$title?></title>
<link href="r/css/normalize.css" rel="stylesheet" type="text/css" />
<link href="r/css/foundation.css" rel="stylesheet" type="text/css" />
<link href="r/css/jQui.css" rel="stylesheet" type="text/css" />
<link href="r/css/custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="r/js/jquery.js"></script>
<script type="text/javascript" src="r/js/modernizr.js"></script>
<script type="text/javascript" src="r/js/funciones.js"></script>
<script type="text/javascript" src="r/js/jQui.js"></script>
<script type="text/javascript" src="r/js/timepicker.js"></script>
<script type="text/javascript" src="r/js/autosize.js"></script>
</head>

<body>
	<div class="small-12 medium-10 medium-offset-1">
	<?

	if ($_GET["e"]!=""){errorPrint (htmlentities($_GET["e"]));}
	if(isset($_SESSION["myusername"]) && isset($_SESSION["mypermisos"])){
	/*if(session_is_registered(myusername) && session_is_registered(mypermisos)){*/
		
		include ("r/html/menu.php");
		if ($_GET["a"] && $_GET["q"]) {
			if ($secciones[$_GET["q"]]["p"]<=$_SESSION["mypermisos"]) {
				include(htmlentities($_GET["a"]).'.php');
			}else{
				$embed=0;
				echo "<div class='cuadro'>Las credenciales de la cuenta con la que inició esta sessión (".ucfirst($_SESSION["myusername"]).") no le permiten completar esta acción.</div>";
			}
		}elseif($_GET["q"] && !$_GET["a"]){
			include(htmlentities($_GET["q"]).'.php');
		}else{
			include("home.php");
		}
	}else{
		include ('login.php');
	}
	?>
    </div>
    
    <? include("r/html/joyride.php")?>
    
    <script type="text/javascript" src="r/js/foundation.min.js"></script>
    <script>
    	$(document).foundation();
    </script>
</body>
</html>