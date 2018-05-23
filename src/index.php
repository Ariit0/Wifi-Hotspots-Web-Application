<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Welcome to YelpClone";
			include "include/header.php";
		?>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "displayNavBar.php";
			?>

		</div>
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
	</body>
</html>