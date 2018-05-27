<!DOCTYPE html>
<html>
	<head>
		<title>Logout</title>
		<?php
			include "include/header.php";

			if(isset($_SESSION['userID'])) {
    			unset($_SESSION['userID']); 
    		}

    		if(isset($_SESSION['currentItemID'])){
    			unset($_SESSION['currentItemID']);
    		}

    		if(isset($_SESSION['currentItemName'])){
    			unset($_SESSION['currentItemName']);
    		}

    		if(isset($_SESSION['currentLat'])){
    			unset($_SESSION['currentLat']);
    		}

    		if(isset($_SESSION['currentLng'])){
    			unset($_SESSION['currentLng']);
    		}

    		header(SITE_PATH ."/index.php");
		?>
	</head>

	<body>

	</body>
</html>