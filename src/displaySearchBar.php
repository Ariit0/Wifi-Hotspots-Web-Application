<form class="searchinput" action="results.php">
	<input type="text" name="search" placeholder="Enter address, rating or hotspot name">
	<select class="searchoptions">

	<?php
		// truncates any characters after the specified delimiter
		function truncateStringAfter($string, $delim) { 
		    return substr($string, 0, strpos($string, $delim));
		}

		include "include/initDB.php";

		try {
			$result = $pdo->query('SELECT DISTINCT suburb FROM items ORDER BY suburb');
			$queriedOptions = array();

			// iterates through the queried result and adds them to the queriedOptiosn array
			foreach ($result as $suburb) {
				if (strpos($suburb['suburb'], ',')) { // checks if the string has a comma
					array_push($queriedOptions, truncateStringAfter($suburb['suburb'], ',')); // truncate after the specified delimiter
				} else {
					array_push($queriedOptions, $suburb['suburb']);
				}
			}

			array_unshift($queriedOptions, "&#xf124; &nbsp; Near Me");	
			$options = array_unique($queriedOptions); // removes any duplicate values within the array
			$options = array_values($options); // fixes the array index sequence
			for ($i=0; $i < count($options); $i++) { // echos options
				echo '<option>'.$options[$i].'</option>';
			}
			echo "<i class='fas fa-location-arrow'></i>";

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	?>
	</select>
	<button type="submit"><i class="fa fa-search"></i></button>
</form>

