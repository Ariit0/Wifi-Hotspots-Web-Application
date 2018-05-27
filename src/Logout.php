<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Logout";
			include "include/header.php";

			if(!isset($_SESSION['userID'])) {
		    	header($PATH ."/index.php");
			} else {
    			unset($_SESSION['userID']); 
    		}

    		if(isset($_SESSION['currentItemID'])){
    			unset($_SESSION['currentItemID']);
    		}

    		if(isset($_SESSION['currentItemName'])){
    			unset($_SESSION['currentItemName']);
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
				<h1>Logout</h1>
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