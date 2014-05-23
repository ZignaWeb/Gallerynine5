<?
session_start();

// datos de la session
$session_timeframe = 120; // en minutos

// Variabels de pantalla
$site_name = "ADMIN";
$site_logo = "";

// DB
include ("r/sql.php");
$db_table_prefix = "";

// emails
$email_reservas="restosibaris@windsortower.com";

// variables de navegación
$xpag=20; // numero de elementos mostrado por pagina

// timezone
date_default_timezone_set('America/Argentina/Buenos_Aires');
$hoy = date("Y-n-j");
$ahora = date("Y-n-j H:i:s");
$semIni= date("Y-n-j",strtotime("$hoy next Monday"));
$semFin= date("Y-n-j",strtotime( "$semIni +2 week" ));
// beneficio inicio y fin
$benIni= date("Y-n-j",strtotime("$hoy previous Monday"));
$benFin= date("Y-n-j",strtotime("$benIni +1 Year" ));
//strings
include ("strings/inline.php");

// directiorios (desde el root)
$dir["imgs"]="data/uploads"; // imagenes

// check for timeout and update time if 
if (isset($_SESSION["myusername"]) && isset($_SESSION["timeout"]) && $_SESSION['timeout'] + $session_timeframe * 60 < time()) {
     header("Location: logout.php?e=timeout");
}else{
	$_SESSION['timeout'] = time();
}
include("arq.php");
include("funciones.php");
?>