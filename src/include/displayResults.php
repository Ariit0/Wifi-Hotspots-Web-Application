<?php
	// creates a table using <div> and limits it to 3 results per row (3 column table)
	function displayResults($searchQuery) {
		$columnCount = -1; // used to keep track on what column the array is at

		echo"<form id=\"searchResults\" action=\"sampleitem.php\" method=\"post\">";
		echo "<input type=\"hidden\" name=\"hidden-id\" id=\"hidden-itemid\" value=\"submit\" />"; // used to store ID value to be passed
		echo "<input type=\"hidden\" name=\"hidden-name\" id=\"hidden-itemname\" value=\"submit\" />"; // used to store name value to be passed
		echo "<div class=\"resultBody\">";
		foreach ($searchQuery as $item) {  
			$columnCount++;
			if (($columnCount % 3) == 0) {
				echo "<div class=\"resultRow\">";
			}

			echo "<div class=\"results\">";
			echo "<a href=\"#\" name=".$item['ID']." value=".preg_replace('/\s+/','', $item['name'])." onclick=\"postID(this);\"><h1>".$item['name']."</h1>";
			echo "<p>".$item['address']."";
			echo ", ".$item['suburb']. "</p></a>";
			echo "</div> <!-- end results -->";

			if ($columnCount == 2) { // 3 columns per row
				echo "</div> <!-- end resultsrow -->";
				$columnCount = -1;
			}
		}

		echo "</div><!-- end resultsbody -->";
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

