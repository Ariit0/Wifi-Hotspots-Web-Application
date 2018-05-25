<?php
	// creates a table using <div> and limits it to 3 results per row (3 column table)
	function displayResults($searchQuery) {
		$columnCount = -1;

		echo"<form id=\"searchResults\" action=\"sampleitem.php\" method=\"post\">";
			echo "<div class=\"resultBody\">";
			 echo "<input type=\"hidden\" name=\"hidden-id\" id=\"hidden-itemid\" value=\"submit\" />"; // used to store ID value to be passed
 			 echo "<input type=\"hidden\" name=\"hidden-name\" id=\"hidden-itemname\" value=\"submit\" />"; // used to store name value to be passed
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

	function displayNoResult() {
		echo "<div class=\"resultBody\">";
		echo "<p id=\"nohot\"> No Hotspot locations near you.</p>";
		echo "</div><!-- end resultsbody -->";
	}
?>

