<?php

	// creates a table using <div> and limits it to 3 results per row
	function displayResults($searchQuery) {
		$columnCount = -1;
		$_arrSession = array();

		echo "<div class=\"resultBody\">";
		foreach ($searchQuery as $item) { 
			$columnCount++;

			array_push($_arrSession, $item['ID']); // add IDs to array

			if (($columnCount % 3) == 0) {
				echo "<div class=\"resultRow\">";
			}
				echo "<div class=\"results\">";
				echo "<a href=\"sampleitem.php\"><h1>".$item['name']."</h1>";
				echo "<p>".$item['address']."";
				echo ", ".$item['suburb']. "</p></a>";
				echo "</div> <!-- end results -->";

			if ($columnCount == 2) { // 3 columns per row
				echo "</div> <!-- end resultsrow -->";
				$columnCount = -1;
			}
		}
		echo "</div><!-- end resultsbody -->";

		$_SESSION['itemIDs'] = $_arrSession; // store array of IDs into array to passed on as a session variable
	}


	function displayNoResult() {
		echo "<div class=\"resultBody\">";
		echo "<p id=\"nohot\"> No Hotspot locations near you.</p>";
		echo "</div><!-- end resultsbody -->";
	}
?>

