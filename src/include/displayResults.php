<?php
	// creates a table using <div> and limits it to 3 results per row (3 column table)
	function displayResults($searchQuery) {
		$columnCount = 0; // used to keep track on what column the array is at
		$counter = 0; // tracks number of hidden input fields that are used to store long/lat

		echo"<form id=\"searchResults\" action=\"sampleitem.php\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"hidden-id\" id=\"hidden-itemid\" value=\"\" />"; // used to store ID value to be passed
		echo "<input type=\"hidden\" name=\"hidden-name\" id=\"hidden-itemname\" value=\"\" />"; // used to store name value to be passed
		echo "<input type=\"hidden\" name=\"hidden-lat\" id=\"hidden-itemlat\" value=\"\" />";
		echo "<input type=\"hidden\" name=\"hidden-lng\" id=\"hidden-itemlng\" value=\"\" />";
		echo "<div class=\"resultBody\">";
		foreach ($searchQuery as $item) {  
			if (($columnCount % 3) == 0) {
				echo "<div class=\"resultRow\">";
			}

			echo "<div class=\"results\">";
			echo "<input type=\"hidden\" class=\"resultLatLngs\" name=\"".$item['name']."\" value=\"".$item['latitude']." ".$item['longitude']."\" />"; $counter++;
			// data- attribute used to store custom data
			echo "<a href=\"#\" name=".$item['ID']." value=".preg_replace('/\s+/','', $item['name'])." data-lat=\"".$item['latitude']."\" data-lng=\"".$item['longitude']."\" onclick=\"postID(this);\"><h1>".$item['name']."</h1>";
			echo "<p>".$item['address']."";
			echo ", ".$item['suburb']. "</p></a>";
			echo "</div> <!-- end results -->";

			if ($columnCount == 3) { // 3 columns per row
				echo "</div> <!-- end resultsrow -->";
				$columnCount = 0;
			}
			$columnCount++;
		}
		echo "</div><!-- end resultsbody -->";
		echo "<input type=\"hidden\" id=\"totalLocations\"value=\"".$counter."\"/>";
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

