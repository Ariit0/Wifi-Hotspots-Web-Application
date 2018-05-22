<!DOCTYPE html>
<html>

	<?php
		$title = "Welcome to YelpClone";
		include "include/header.php";
	?>

	<body>
		<div class="nav_bar">
				<nav id="nav_centre">	
					<div id="logo"><img src="img/logo.png" id="logoImg"></div>
					<ul id="menu">	
						<li><a href="index.php" class="selected">Home</a></li> 
						<li><a href="aboutus.php">About</a></li> 
						<li><a href="contactus.php">Contact</a></li>
						<li><a href="login.php">Login</a></li> 
						<li><a href="register.php">Register</a></li> 
					</ul>
				</nav>

			<span id="header_shadow"></span>

			<div id="wrapper">
				<div id="header">
					<h1>Find-a-Hotspot</h1>
				</div>
		
				<div id="content">
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
		</div>
	</body>
</html>