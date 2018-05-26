<?php
	// Creates a table using <div> and limits it to 3 results per row (3 column table)
	function displayResults($searchQuery) {
		// Used to keep track on what column the array is at
		$columnCount = 0;
		// Tracks number of hidden input fields that are used to store long/lat
		$counter = 0;

		echo"<form id=\"searchResults\" action=\"sampleitem.php\" method=\"post\">";

		// Hidden input fields that are set by php code when a search result is selected. Used to send data about the result to the dynamic item page.
		echo "<input type=\"hidden\" name=\"hidden-id\" id=\"hidden-itemid\" value=\"\" />";
		echo "<input type=\"hidden\" name=\"hidden-name\" id=\"hidden-itemname\" value=\"\" />"; 
		echo "<input type=\"hidden\" name=\"hidden-lat\" id=\"hidden-itemlat\" value=\"\" />";
		echo "<input type=\"hidden\" name=\"hidden-lng\" id=\"hidden-itemlng\" value=\"\" />";

		echo "<div class=\"resultBody\">";
		// Foreach search result...
		foreach ($searchQuery as $item) {  
			// Start a new row every 3 results.
			if (($columnCount % 3) === 0) {
				echo "<div class=\"resultRow\">";
			}

			// Hidden field for each map marker to assign their values from.
			echo "<input type=\"hidden\" class=\"resultData\" data-name=\"".$item['name']."\" data-lat=\"".$item['latitude']."\" data-lng=\"".$item['longitude']."\" data-id=\"".$item['ID']."\"/>"; 

			// Create the html of the result.
			echo "<div class=\"results\">";
			echo "<a href=\"#\" name=".$item['ID']." value=".preg_replace('/\s+/','', $item['name'])." data-lat=\"".$item['latitude']."\" data-lng=\"".$item['longitude']."\" onclick=\"postID(this);\"><h1>".$item['name']."</h1>";
			echo "<p>".$item['address']."";
			echo ", ".$item['suburb']. "</p></a>";
			echo "</div> <!-- end results -->";

			$counter++;
			$columnCount++;
			// 3 columns per row
			if ($columnCount === 3) { 
				echo "</div> <!-- end resultsrow -->";
				$columnCount = 0;
			}
		}
		// Ensure the last row div is closed.
		if (($counter % 3) !== 0) { 
			echo "</div> <!-- end resultsrow -->";
		}

		echo "</div><!-- end resultsbody -->";
		// Hidden field for map markers to know how many results were found.
		echo "<input type=\"hidden\" id=\"totalLocations\" value=\"".$counter."\"/>";
		
		echo "</form><!-- end form -->";
	}

	function displayNoResultNearMe() {
		echo "<div class=\"resultBody\">";
		echo "<p id=\"nohot\"> No Hotspot locations near you.</p>";
		echo "</div><!-- end resultsbody -->";
	}

	function displayNoResult() {
		echo "<div class=\"resultBody\">";
		echo "<p id=\"nohot\"> Your search did not match any hotspots.</p>";
		echo "</div><!-- end resultsbody -->";
	}
?>

