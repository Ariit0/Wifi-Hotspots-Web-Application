<form class="searchinput" id="searchEngine" action="search-submit.php" method="post">
	<input type="text" name="srch" placeholder="Enter address or hotspot name">

	<select class="ratingfilter" name="rating">
		<option value='0'>--------</option>
		<option value='5'>5+&nbsp;&#xf005;</option>
		<option value='4'>4+&nbsp;&#xf005;</option>
		<option value='3'>3+&nbsp;&#xf005;</option>
		<option value='2'>2+&nbsp;&#xf005;</option>
	</select>

	<select class="suburbfilter" name="suburb" id="suburbOption" onchange="getLocation();">
		<?php
			// Truncates any characters after the specified delimiter
			function truncateStringAfter($string, $delim) { 
			    return substr($string, 0, strpos($string, $delim));
			}

			try {
				$stmt = $pdo->prepare('SELECT DISTINCT suburb FROM items ORDER BY suburb');
				$stmt->execute();
				$queriedOptions = array();

				// Iterates through the queried result and adds them to the queriedOptiosn array
				foreach ($stmt as $result) {
					// Checks if the string has a comma
					if (strpos($result['suburb'], ',')) {
						// If so, truncate the string after the comma to get only the suburb.
						array_push($queriedOptions, truncateStringAfter($result['suburb'], ','));
					} else {
						array_push($queriedOptions, $result['suburb']);
					}
				}

				// Removes any duplicate values within the array
				$options = array_unique($queriedOptions); 
				// Fixes the array index sequence
				$options = array_values($options); 

				echo "<option value=\"0\">----Select Suburb----</option>";
				$nearMe = "&#xf124; &nbsp; Near Me";
				echo '<option value = \'NearMe\'>'.$nearMe.'</option>';
				for ($i=0; $i < count($options); $i++) {
					// Use preg_replace to remove any whitespace from options to use as the value, and keep whitespace for the presented text
					echo '<option value = '.preg_replace('/\s+/','', $options[$i]).'>'.$options[$i].'</option>';
				}
			} catch (PDOException $e) {
				
			}
		?>
	</select>
	<!-- Hidden input tags to send geo location data to php script -->
	<input type="hidden" id="hidden-lat" name="lat" value="">
	<input type="hidden" id="hidden-long" name="long" value="">

	<button type="submit" name="search"><i class="fa fa-search"></i></button>
	<script type="text/javascript" src="js/search.js"></script>
</form>

