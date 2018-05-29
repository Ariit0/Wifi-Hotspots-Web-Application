<?php 
	// Used to allow back tracking to search results page
	header('Cache-Control: no cache');
	session_cache_limiter('private_no_expire');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Search Results</title>
		<?php
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
				<h4>A place to discover and review WiFi Hotspots near you.</h4>

				<div id="resultList">
					<?php
						// If the user hit the search button from the home page, display the results
						if (isset($_POST["search"])) {
							include 'include/search-query.php';
						} else {
							//  Otherwise, redirect to home page since they are trying to access search-submit URL directly
            				header(SITE_PATH ."/index.php");							
            			}
					?>

					<!-- This map is called at the bottom due to the method of transfering php variables to js variables -->
					<!-- CSS is used to bring the map to the top of the webpage, above the reviews -->
					<div id="mapContainer"> 
						<div id="initMap"></div>
						<!-- Google api call for google maps, must be called here -->
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeDXwaLc0EQeMCbofBs7OwhOU32X4fY1E&callback=initMap"></script>
					</div> 
				</div> 
			</div>
			
			<?php
				include "include/footer.php"
			?>
		</div>
	</body>
</html>