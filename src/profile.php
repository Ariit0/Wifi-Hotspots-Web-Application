<!DOCTYPE html>
<html>
	<head>
		<title>My Profile</title>
		<?php
			include "include/header.php";
			
			// Redirect user to home page if they are not logged in (should not be able to see profile page if not logged in)
			if(!isset($_SESSION['userID'])) {
		    	header(SITE_PATH ."/login.php");
			}
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
				<h1>My Profile</h1>
			</div>
					
			<div id="content">
				Welcome to my profile! There's nothing here yet...
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>