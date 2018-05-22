<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Search Results";
			include "include/header.php";
		?>
		<script type="text/javascript" src="js/results.js"></script>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "displayNavBar.php";
			?>
		</div>

		<div id="wrapper">
			<div id="header">
				<h1> Results </h1>
			</div>

			<div id="content">
				<h2>Results</h2>
				<h4>A place to discover and review WiFi Hotspots near you.</h4>

				<div id="resultContainer">
					<div id="initMap"></div>
					<!-- google api call for google maps, must be called here -->
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeDXwaLc0EQeMCbofBs7OwhOU32X4fY1E&callback=initMap"></script>

					<div id="resultList">
						<div class="results">
							<a href="sampleitem.php">

								<h1>Result 1</h1>
								<p>A short sentence of arbitrary text</p>

							</a>
							
							<h1>Result 2</h1>
							<p>A different short sentence of arbitrary text</p>

							<h1>Result 3</h1>
							<p>A short sentence of arbitrary text</p>

							<h1>Result 4</h1>
							<p>A short sentence of arbitrary text</p>
							<h1>Result 5</h1>
							<p>A short sentence of arbitrary text</p>
							<h1>Result 6</h1>
							<p>A short sentence of arbitrary text</p>
							<h1>Result 7</h1>
							<p>A short sentence of arbitrary text</p>

						</div> <!-- end results -->
					</div> <!-- end resultList -->
				</div> <!-- end resultwrapper -->
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>