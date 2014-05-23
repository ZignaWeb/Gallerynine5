<?
include("cp/r/sql.php");
$backto=$_SERVER["HTTP_REFERER"];
$email = mysql_real_escape_string($_POST["Email"]);
$ahora = date("Y-n-j H:i:s");
$ereg="^[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[@]{1}[-A-Za-z0-9_]+[-A-Za-z0-9_.]*[.]{1}[A-Za-z]{2,5}$";
$exist = mysql_num_rows(mysql_query("SELECT * FROM `newsletter` WHERE `email`='$email'"));
if ($exist==0 && $email!="" && ereg($ereg, $email)){
	mysql_query("INSERT INTO `newsletter` SET `email`='$email', `agregado`='$ahora'");
}
header ("Location: $backto");
?>