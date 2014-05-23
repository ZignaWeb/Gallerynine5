<form class="large-12 column" id="adminForm" action="<?=$_SERVER['REQUEST_URI']?>" method="post" enctype="multipart/form-data">
<?
// get form lelements
			foreach ($secciones[$_GET["q"]]["c"] as $globKey => $val) {
				$titulo=$val["t"];
				$palceholder=$titulo;
				
				if ($val["hide"]>1) {$hidden=" style='display:none'";}else{$hidden="";}
				if ($val["force"]==1) {$clase=" force";$char="<span class='asterisco'>*</span>";}else{$clase=""; $char="";}
				if ($val["val"]=="date"){
					$clase.=" date";
					$titulo.=" <span style='font-size:12px'>YYYY-MM-DD</span>";
					}else{
					$clasetime="";
				}
				if ($val["val"]=="datetime"){
					$clase.=" datetime";
					$titulo.=" <span style='font-size:12px'>YYYY-MM-DD HH:MM:SS</span>";
					}else{
					$clasetime="";
				}
				
				if (isset($val["autofill"])) {
					$valor=$val["autofill"];
					}else{
					$valor="";
				}
				
				$label = "<div $hidden><h3>$titulo $char</h3>";
				echo $label;
				
				if (!isset($val["dependency"])) {
					
					
					if ($val["type"]=="input"){
						$keyInput=$globKey;
						if ($keyInput == "dep_table" || $keyInput == "dep_id") {
							$valor = $_GET[$keyInput];
							echo "<input class='$clase' type='hidden' name='".$val["db"]."' value='$valor'/>";
						}else{
							echo "<input class='$clase' type='text' placeholder='".$palceholder."' name='".$val["db"]."' value='$valor'/>";
						}
					}if ($val["type"]=="password"){
						echo "<input class='$clase' type='password' placeholder='".$palceholder."' name='".$val["db"]."' value='$valor'/>";
					}elseif ($val["type"]=="textarea"){
						echo "<div class='rtfbox' id='".$val["db"]."'>";
						include ("r/html/rtfbuttons.php");
						echo "<textarea class='$clase' rows='5' placeholder='".$palceholder."' name='".$val["db"]."'>$valor</textarea>
						<script type='text/javascript'>richTextualize('#".$val["db"]."');</script>
					</div>";
					}elseif ($val["type"]=="img"){
						echo "<input class='$clase' placeholder='".$palceholder."' name='".$val["db"]."' type='file' />";
					}elseif($val["type"]=="select"){
						echo "<div class='optGroup $clase'>";
						$i=0;
						foreach($val["options"] as $key => $text){
							if ($i==0) { $selected="checked='checked'";}else{$selected="";}
							echo "<input type='radio' $selected id='".$val["db"]."$key' name='".$val["db"]."' value='$key' /> <label for='".$val["db"]."$key' >$text</label>";
							$i++;
						}
						echo "</div>";
					}elseif($val["type"]=="drop"){
						
						$tabla=$secciones[$val["get"]]["db"];
						$key=key($secciones[$val["get"]]["c"]);
						$field=$secciones[$val["get"]]["c"][$key]["db"];
						
						echo "<select class='$clase' name='".$val["db"]."'><option value=' '>".$inline["sindefinir"]."</option>";
						$gq=mysql_query("SELECT * FROM `$tabla` WHERE 1 ORDER BY `$field` ASC");
						while ($gd=mysql_fetch_assoc($gq)){
							echo "<option value='".$gd["id"]."'>".$gd[$field]."</option>";
						}
						echo "</select>";
					}				
					// if true end	
				}
				echo "</div>";
			}
?>
<hr />
            <input class="button small-12" type="submit" />
        </form>