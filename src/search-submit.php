<?php
	if (isset($_POST["search"])) {
		$_searchInput = $_POST['srch'];
		$_rateInput = $_POST['rating'];
		$_suburbInput = $_POST['suburb'];
		$_getLat = $_POST['lat'];
		$_getLong = $_POST['long'];

			echo "Seachinput = $_searchInput <br>";
			echo "Rate = $_rateInput <br>";
			echo "Suburb = $_suburbInput <br>";
		
		require 'include/initDB.php';

		try {
			if ($_suburbInput == "NearMe") { // query in geo location date and search based on long and lat
								echo "im here for somereason";
				// used to set a arbitrary range near me location
				$_latUpper = floatval($_getLat) + 0.4;
				$_latLower = floatval($_getLat) - 0.4;
				$_loUpper = floatval($_getLong) + 0.4;
				$_loLower = floatval($_getLong) - 0.4;


				$searchQuery = $pdo->prepare("SELECT name, address, suburb FROM items WHERE (latitude BETWEEN ':latLower' AND ':latUpper') AND (longitude BETWEEN ':loLower' AND ':loUpper') ");
				$searchQuery->bindValue(':latUpper', $_latUpper);
				$searchQuery->bindValue(':latLower', $_latLower);
				$searchQuery->bindValue(':loUpper', $_latUpper);
				$searchQuery->bindValue(':loLower', $_latLower);
				$searchQuery->execute();
			} else { 
												echo "im here foraassdsaasasdsdasomereason";
				$searchQuery = $pdo->prepare("SELECT name, address, suburb FROM items WHERE suburb LIKE '%$_suburbInput%' AND (address LIKE '%:_searchInput%' OR name LIKE '%$_searchInput%')");
				// $searchQuery = $pdo->prepare("SELECT name, address, suburb FROM items WHERE suburb LIKE '%:suburb%' AND (address LIKE '%:address%' OR name LIKE '%:name%')");

				// $searchQuery->bindValue(':suburb', $_suburbInput);
				// $searchQuery->bindValue(':address', $_searchInput);
				// $searchQuery->bindValue(':name', $_searchInput);
				$searchQuery->execute();

				foreach ($searchQuery as $suburb) {
					echo "".$suburb['name']." <br>";
					echo "".$suburb['address']." <br>";
					echo "".$suburb['suburb']. "<br>";
				}
			}


			// echo "Lat = $_latUpper <br>";
			// echo "latlo = $_latLower <br>";
			// echo "Lat = $_loUpper <br>";
			// echo "latlo = $_loLower <br>";


		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	} else {
		echo "errors";
	}
?>