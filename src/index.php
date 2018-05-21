<!DOCTYPE html>
<html>

	<?php
		$title = "Welcome to YelpClone";
		include "include/header.php";
	?>

	<body>
		<div id="wrapper">
			<div id="header">
				<h1> Yelp Clone </h1>
			</div>
			
			<div id="menu">
				<a href="index.php" class="selected">Home</a><a href="login.php">Login</a><a href="register.php">Register</a><a href="aboutus.php">About</a><a href="contactus.php">Contact</a>
			</div>

			<div id="content">
				<h2>Find-a-Hotspot</h2>
				<h4>A place to discover and review WiFi Hotspots near you.</h4>

				<div id="searchbar">
					<?php
						include "displaySearchBar.php";
					?>
				</div>

			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>

	</body>

</html>