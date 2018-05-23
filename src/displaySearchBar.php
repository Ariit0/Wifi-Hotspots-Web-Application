<form class="searchinput" id="searchEngine" action="search-submit.php" method="post">
	<input type="text" name="srch" placeholder="Enter address or hotspot name">
	<select class="ratingfilter" name="rating">
		<?php
			$star = array("-----", "5&nbsp;&#xf005;", "4+&nbsp;&#xf005;", "3+&nbsp; &#xf005;", "2+&nbsp;&#xf005;", "1+&nbsp;&#xf005;");
			$starValue = array(0, 5, 4, 3, 2, 1);
			for ($i=0; $i < count($star); $i++) { 
				echo '<option value ='.$starValue[$i].'>'.$star[$i].'</option>';
			}
		?>
	</select>
	<select class="suburbfilter" name="suburb" id="suburbOption" onchange="getLocation();">
		<?php
			// truncates any characters after the specified delimiter
			function truncateStringAfter($string, $delim) { 
			    return substr($string, 0, strpos($string, $delim));
			}

			include 'include/initDB.php';

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

				$options = array_unique($queriedOptions); // removes any duplicate values within the array
				$options = array_values($options); // fixes the array index sequence

				echo "<option>----------------------</option>";
				$nearMe = "&#xf124; &nbsp; Near Me";
				echo '<option value = \'NearMe\'>'.$nearMe.'</option>';
				for ($i=0; $i < count($options); $i++) { // echos options
					// use preg_replace to remove any whitespace from options to use as value
					echo '<option value = '.preg_replace('/\s+/','', $options[$i]).'>'.$options[$i].'</option>';
				}
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		?>
	</select>

	<input type="hidden" id="hidden-lat" name="lat" value="">
	<input type="hidden" id="hidden-long" name="long" value="">

	<button type="search" name="search"><i class="fa fa-search"></i></button>
	<script type="text/javascript" src="js/search.js"></script>
</form>

