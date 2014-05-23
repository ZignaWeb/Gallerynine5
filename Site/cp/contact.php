<hr />
<div class="column small-12">
    <h1><?=$inline["editar"]?>:  Contact</h1>
</div>
<hr />
<div class="large-8 column">
<?
if (!$_POST){
	$dt="SELECT * FROM `contact` WHERE `id`='1'";
	$dq=mysql_query($dt);
	$dd=mysql_fetch_assoc($dq);
?>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
	
    <h3>Info</h3>
    <div class='rtfbox' id='info'>
    <?
	include ("r/html/rtfbuttons.php");
	?>
    <textarea name="info"><?=stripslashes(stripslashes($dd["info"]))?></textarea>
    <script type='text/javascript'>richTextualize('#info');</script>
    
	<input class="button small-12" type="submit" />
</form>
<?
include ("r/html/linkpopup.php");
}else{
	$info=mysql_real_escape_string($_POST["info"]);
	$at="UPDATE `contact` SET `info`='$info' WHERE `id`='1'";
	$aq=mysql_query($at);
	if ($aq){
		echo $inline["editado"].": CONTACT";
	}else{
		echo ucfirst($error["tryagain"]);
	}
}
?>
</div>