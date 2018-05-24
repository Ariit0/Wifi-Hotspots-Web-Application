<?php
		require 'displayResults.php';

		$_searchInput = $_POST['srch'];
		$_rateInput = $_POST['rating'];
		$_suburbInput = $_POST['suburb'];
		$_getLat = $_POST['lat'];
		$_getLong = $_POST['long'];
		
		require 'include/initDB.php';

		try { // TODO: search by rating
			if ($_suburbInput == "NearMe") { // query in geo location date and search based on long and lat
				// used to set a arbitrary range for near me location
				$_latUpper = floatval($_getLat) + 0.1;
				$_latLower = floatval($_getLat) - 0.1;
				$_loUpper = floatval($_getLong) + 0.1;
				$_loLower = floatval($_getLong) - 0.1;

				$searchQuery = $pdo->prepare("SELECT name, address, suburb FROM items WHERE ((latitude BETWEEN :latLower AND :latUpper) AND (longitude BETWEEN :loLower AND :loUpper)) ");
				$searchQuery->bindValue(':latLower', $_latLower);
				$searchQuery->bindValue(':latUpper', $_latUpper);
				$searchQuery->bindValue(':loLower', $_loLower);
				$searchQuery->bindValue(':loUpper', $_loUpper);
				$searchQuery->execute();

				if ($searchQuery->rowCount() > 0) {
					displayResults($searchQuery);
				} else {
					displayNoResult();
				}

			} else { // regular search engine query 
				$searchQuery = $pdo->prepare("SELECT name, address, suburb FROM items WHERE suburb LIKE ? OR (address LIKE ? OR name LIKE ?)");
				$searchQuery->bindValue(1, "%".$_suburbInput."%", PDO::PARAM_STR);
				$searchQuery->bindValue(2, "%".$_searchInput."%", PDO::PARAM_STR);
				$searchQuery->bindValue(3, "%".$_searchInput."%", PDO::PARAM_STR);
				$searchQuery->execute();

				if ($searchQuery->rowCount() > 0) {
					displayResults($searchQuery);
				} else {
					displayNoResult();
				}
			}

		} catch (PDOException $e) {
			echo $e->getMessage();
		}

?>