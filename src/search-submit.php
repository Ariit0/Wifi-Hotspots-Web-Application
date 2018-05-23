<?php
	if (isset($_POST["search"])) {
		$_searchInput = $_POST['srch'];
		$_rateInput = $_POST['rating'];
		$_suburbInput = $_POST['suburb'];

		echo "<script>test();</script)";

		echo $test = "<script>getLong();</script>";

		$_getLat = $_POST['myLat'];
		$_getLong = $_POST['myLong'];

		// testing 
		echo $test;
	    echo $_getLat;
	    echo $_getLong;
		
		require 'include/initDB.php';

		try {
			if (!empty($_searchInput) && $_rateInput < 0 && $_searchInput != "NearMe") {
				$searchQuery = $pdo->prepare("SELECT name, address, suburb FROM items WHERE suburb LIKE '%:suburb%' AND (address LIKE '%:address%' OR name LIKE '%:name%')");
				$searchQuery->bindValue(':suburb', $_suburbInput);
				$searchQuery->bindValue(':address', $_searchInput);
				$searchQuery->bindValue(':name', $_searchInput);
				$searchQuery->execute();
			} else { // query in geo location date and search based on long and lat
				$searchQuery = $pdo->prepare("SELECT name, address, suburb FROM items WHERE (latitude BETWEEN '%:latUpper%' AND '%:latLower%') AND (longitude BETWEEN '%:loUpper%' AND '%:loLower%') ");
				$searchQuery->bindValue(':lat', $_suburbInput);
				$searchQuery->bindValue(':long', $_searchInput);
				$searchQuery->bindValue(':name', $_searchInput);
				$searchQuery->execute();
			}

			echo "Seachinput = $_searchInput <br>";
			echo "Rate = $_rateInput <br>";
			echo "Suburb = $_suburbInput <br>";

			foreach ($searchQuery as $suburb) {
				echo "".$suburb['name']." <br>";
				echo "".$suburb['address']." <br>";
				echo "".$suburb['suburb']. "<br>";
			}

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	} else {
		echo "errors";
	}
?>