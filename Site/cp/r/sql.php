<?
$db_server="localhost";
$db_name="gllrnin5_zigna";
$db_usr="gllrnin5_zigna";
$db_psw="odlw^7r9bt)e";

$dbh = mysql_connect ($db_server, $db_usr, $db_psw) or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ($db_name);
?>