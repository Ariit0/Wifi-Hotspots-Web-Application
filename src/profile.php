<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "My Profile";
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