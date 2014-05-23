<div class="small-12 medium-6 medium-offset-3">

     	<form action="private.php" method="post">
        	<?
			if (isset($msje)) {
				echo '<p class="msjemail">'.$msje.'</p>';
			}
			?>
          <div class="large-12">
            <div class="large-11 medium-11 medium-offset-1">
              <div class="row">
                <div class="small-3 medium-3 columns">
                  <label for="right-label" class="right inline">USER</label>
                </div>
                <div class="small-9 medium-9 columns">
                  <input type="text" name="usr" id="right-label">
                </div>
              </div>
              <div class="row">
                <div class="small-3 medium-3 columns">
                  <label for="right-label" class="right inline">PASSWORD</label>
                </div>
                <div class="small-9 medium-9 columns">
                  <input type="password" name="psw" id="right-label">
                </div>
              </div>
              <div>
              	<label class="right "><input class="logIn over" type="submit" value="LOG-IN"></label>
              </div>
            </div>
          </div>
		</form>
     </div>
</div>