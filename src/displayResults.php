<?php
	function displayResults($searchQuery) {
		$_id = 0;
		foreach ($searchQuery as $suburb) {
			echo "<div class=\"results\" id = \"res$_id\">";
			echo "<a href=\"sampleitem.php\"><h1>".$suburb['name']."</h1>";
			echo "<p>".$suburb['address']."";
			echo ", ".$suburb['suburb']. "</p></a>";
			echo "</div> <!-- end results -->";
			$_id++;
		}
	}

	function displayNoResult() {
		echo "<div class=\"results\">";
		echo "<p> No Hotspot locations near you.</p>";
		echo "</div> <!-- end results -->";
	}
?>

