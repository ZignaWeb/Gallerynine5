<?
error_reporting(E_ALL);
if ($embed!=1 || !isset($embed)) { 
	header("Location:./");
}
?>
<hr />
<h2 class="column small-12"><?=$inline["setup"]?></h2>
<p class="column small-12"><?=$info["setup"]?></p>
<hr />
<h3><?=$info["dataconfigstatus"]?></h3>
<?
// crear tablas
foreach($secciones as $val){
	$tabla = $val["db"];
	$checTables="SELECT * 
FROM  `information_schema`.`TABLES` 
WHERE  `information_schema`.`TABLES`.`TABLE_NAME` =  '$tabla' ";
	if (mysql_num_rows(mysql_query($checTables))==0){
		$sqlTable = "CREATE TABLE `$tabla` (";
		foreach($val["c"] as $val1){
			$columna = $val1["db"];
			$type	= $val1["val"];
			# varchar / text / file / email / number / date / datetime
			if ($type=="varchar" || $type=="file" || $type=="email" ){
				$sqlTable .=" `$columna` VARCHAR(100), ";
			}elseif($type=="text" || $type=="codigo"){
				$sqlTable .=" `$columna` TEXT, ";
			}elseif($type=="number" || $type=="select") {
				$sqlTable .=" `$columna` INT, ";
			}elseif($type=="date"){
				$sqlTable .=" `$columna` DATE, ";
			}elseif($type=="datetime"){
				$sqlTable .=" `$columna` DATETIME, ";
			}
		}
		
		$sqlTable .= "`id` INT NOT NULL AUTO_INCREMENT, PRIMARY KEY ( `id` ))";

		if (mysql_query($sqlTable)) {
			echo "<p class='column small-12 alert-box success'>".$info["tablacreada"].": '$tabla'</p>";
		}else{
			echo "<p class='column small-12 alert-box alert'>".$info["errorcreatetable"]." '$tabla'</p>";
		}

	}else{
		echo "<p class='column small-12 alert-box info'>".str_replace("[:x:]",$tabla,$info["tablaexiste"])."</p>";
	}
}
?>