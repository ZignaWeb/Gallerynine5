<div class="small-12 medium-12 large-12">
<?
// artists
$artist_t = "SELECT `artists`.`nombre`, `artists`.`id` FROM `artists` WHERE `mostrar`='2'";
$artist_q = mysql_query($artist_t);
while ($data=mysql_fetch_assoc($artist_q)) {
	$picq=mysql_query("SELECT `url`, `titulo` FROM `media` WHERE `dep_id`='".$data["id"]."' AND `dep_table`='art' AND `type`='img' AND  `media`.`mostrar`!='0' ORDER BY `id` ASC LIMIT 1");
	while ($pic=mysql_fetch_assoc($picq)) {
		
		if ($pic["url"]!="") {
		$src='cp/data/uploads/thumb/'.$pic["url"];
		}else{
			$src='http://placehold.it/200x200&text='.$data["nombre"];
		}
		echo '<div class="large-3 medium-4 small-6 column left">
				 <a href="perfil.php?i='.$data["id"].'">
					<img alt="'.$data["nombre"].'" class="small-12" src="'.$src.'">
				 </a>
				 <p class="center"><a href="perfil.php?i='.$data["id"].'">'.$data["nombre"].' - '.$pic["titulo"].'</a></p>
			</div>';
			
	}
	
}

if (mysql_num_rows($artist_q)==0){
	echo str_replace("[:x:]","results","There are no [:x:] to list at this moment.");
}
?>
</div>