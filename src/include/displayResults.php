<?php

	// creates a table using <div> and limits it to 3 results per row
	function displayResults($searchQuery) {
		$columnCount = -1;

		echo "<div class=\"resultBody\">";
		foreach ($searchQuery as $suburb) { 
			$columnCount++;
			if (($columnCount % 3) == 0) {
				echo "<div class=\"resultRow\">";
			}
				echo "<div class=\"results\">";
				echo "<a href=\"sampleitem.php\"><h1>".$suburb['name']."</h1>";
				echo "<p>".$suburb['address']."";
				echo ", ".$suburb['suburb']. "</p></a>";
				echo "</div> <!-- end results -->";

			if ($columnCount == 2) { // 3 columns per row
				echo "</div> <!-- end resultsrow -->";
				$columnCount = -1;
			}
		}
		echo "</div><!-- end resultsbody -->";
	}


	function displayNoResult() {
		echo "<div class=\"resultBody\">";
		echo "<div class=\"results\">";
		echo "<p> No Hotspot locations near you.</p>";
		echo "</div> <!-- end results -->";
		echo "</div><!-- end resultsbody -->";
	}
?>

