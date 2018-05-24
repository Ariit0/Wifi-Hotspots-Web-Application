<?php 
	session_start();
?>
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
				include "include/displayNavBar.php";
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
				</div> <!-- end resultwrapper -->
					<div id="resultList">
						<?php
							if (isset($_POST["search"])) {
								include 'include/search-query.php';
							} else {
								//  redirect to index if trying to access search-submit URL directly
                				header("Location: http://{$_SERVER['HTTP_HOST']}/yelpclone/index.php");							
                			}
						?>
					</div> <!-- end resultList -->
				</div> <!-- end content -->
			<?php
				include "include/footer.php"
			?>
		</div><!-- wrapper content -->
	</body>
</html>

