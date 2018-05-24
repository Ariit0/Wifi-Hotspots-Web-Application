<?php 
    session_start(); 
    unset($_SESSION['LoggedInEmail']); 
?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Logout";
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
				<h1>See you next time.......</h1>
			</div>
					
			<div id="content">
				Successfully logged out.
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>