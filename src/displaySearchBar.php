<form class="searchinput" action="results.php">
	<input type="text" name="search" placeholder="Enter address, rating or hotspot name">
	<select>

	<?php
		// truncates any characters after the specified delimiter
		function truncateStringAfter($string, $delim) { 
		    return substr($string, 0, strpos($string, $delim));
		}

		include "include/initDB.php";

		try {
			$result = $pdo->query('SELECT DISTINCT suburb FROM items ORDER BY suburb');

			foreach ($result as $suburb) {
				if (strpos($suburb['suburb'], ',')) { // checks if the string has a comma
					echo '<option>',truncateStringAfter($suburb['suburb'], ','),'</option>'; // truncate after the specified delimiter
				} else {
					echo '<option>', $suburb['suburb'],'</option>';
				}

			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}


	?>
	</select>
	<button type="submit"><i class="fa fa-search"></i></button>
</form>

