<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- using fontawesome for icon fonts -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<script type="text/javascript" src="results.js"></script>

		<title>Search Results</title>
	</head>
	<body>

		<div id="wrapper">
			<div id="header">
				<h1> Yelp Clone </h1>
			</div>
			
			<div id="menu">
				<a href="index.php" class="selected">Home</a><a href="login.php">Login</a><a href="register.php">Register</a><a href="aboutus.php">About</a><a href="contactus.php">Contact</a>
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
			
			<div id="footer">
				<p>Ari Luangamath (n9446826) & George Delosa (n9751696) </p>
				<a href="https://github.com/Ariit0/CAB230-Assessment" target="_blank"> Link to GitHub Repo</a>
			</div>
		</div>

	</body>

</html>