<form class="searchinput" action="results.php">

	<?php
		include "include/initDB.php";

		try {
			
		} catch (Exception $e) {
			
		}


	?>
	<input type="text" name="search" placeholder="Enter address, rating or hotspot name">
	<select>
		  <option value="Annerley">Annerley</option>
		  <option value="Chermisde">Chermisde</option>
		  <option value="Banyo">Banyo</option>
		  <option value="Ashgrove">Ashgrove</option>
	</select>
	<button type="submit"><i class="fa fa-search"></i></button>
</form>

