<!DOCTYPE html>
<html>
	<head>
		<title>Welcome to WifiFinder</title>
		<?php
			include "include/header.php";
		?>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "include/displayNavBar.php";
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
						require_once 'include/initDB.php';

						$pdo = initDB();
						if(is_null($pdo)) {
							echo '<span style="color:red">Server failed to connect to database. Please try again later.</span>';
						} else {
							include "include/displaySearchBar.php";
						}
					?>
				</div>
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>