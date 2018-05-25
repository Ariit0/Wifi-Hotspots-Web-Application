<?php
		require 'displayResults.php';

		$_searchInput = $_POST['srch'];
		$_rateInput = $_POST['rating'];
		$_suburbInput = $_POST['suburb'];
		$_getLat = $_POST['lat'];
		$_getLong = $_POST['long'];
		// adds a space before each captial letter (excluding the first letter)
		$formattedSub = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $_suburbInput));
		
		require 'include/initDB.php';

		try { 
			if ($_suburbInput == "NearMe") { // if near me option selected, query in geo location date and search based on long and lat
				// used to set a arbitrary range for near me location
				$_latUpper = floatval($_getLat) + 0.12;
				$_latLower = floatval($_getLat) - 0.12;
				$_loUpper = floatval($_getLong) + 0.12;
				$_loLower = floatval($_getLong) - 0.12;
				// search query which is sent to the db, checks for any items which rating is greater than the rate input and checks for areas which are within its arbitrary range
				if ($_rateInput != 0) {	// does not consider search input, only rating input. 
					$searchQuery = $pdo->prepare("SELECT it.*, rt.averageRating FROM items AS it JOIN (SELECT ID, itemID, AVG(rating) AS averageRating FROM reviews GROUP BY itemID) AS rt ON it.ID = rt.itemID WHERE rt.averageRating >= :rateInput AND ((it.latitude BETWEEN :latLower AND :latUpper) AND (it.longitude BETWEEN :loLower AND :loUpper))");
					$searchQuery->bindValue(':rateInput', $_rateInput);
				} else { // if the suburbinput is at default value		 
					$searchQuery = $pdo->prepare("SELECT it.*, rt.averageRating FROM items AS it JOIN (SELECT ID, itemID, AVG(rating) AS averageRating FROM reviews GROUP BY itemID) AS rt ON it.ID = rt.itemID WHERE ((it.latitude BETWEEN :latLower AND :latUpper) AND (it.longitude BETWEEN :loLower AND :loUpper))");
				}

				$searchQuery->bindValue(':latLower', $_latLower);
				$searchQuery->bindValue(':latUpper', $_latUpper);
				$searchQuery->bindValue(':loLower', $_loLower);
				$searchQuery->bindValue(':loUpper', $_loUpper);
				$searchQuery->execute();

				if ($searchQuery->rowCount() > 0) {
					displayResults($searchQuery);
				} else {
					displayNoResultNearMe();
				}
			} else { // regular search engine query 
				if ($_suburbInput == "0" && $_searchInput == "" && $_rateInput == "0") { // if all fields are set at default query all results
							   echo '<script>console.log(\'1111\')</script>';
					$searchQuery = $pdo->prepare("SELECT * FROM items");
				} else if ($_suburbInput == "0" && $_rateInput == "0") { // if there's search input, but suburb + rate value still set at default
					$searchQuery = $pdo->prepare("SELECT * FROM items WHERE (address LIKE ? OR name LIKE ?)");
					$searchQuery->bindValue(1, "%".$_searchInput."%", PDO::PARAM_STR);
					$searchQuery->bindValue(2, "%".$_searchInput."%", PDO::PARAM_STR);
				} else if ($_searchInput == "" && $_rateInput == "0") { // if there's suburb input, but search + rate input is default
					$searchQuery = $pdo->prepare("SELECT * FROM items WHERE suburb LIKE ?");
					$searchQuery->bindValue(1, "%" .$formattedSub."%", PDO::PARAM_STR);	
				} else if ($_rateInput == "0") { // search and suburb input not at its default value but rating is left alone
					$searchQuery = $pdo->prepare("SELECT it.*, rt.averageRating FROM items WHERE it.suburb LIKE ? AND (address LIKE ? OR name LIKE ?)");

					$searchQuery->bindValue(1, "%" .$formattedSub."%", PDO::PARAM_STR);	
					$searchQuery->bindValue(2, "%".$_searchInput."%", PDO::PARAM_STR);
					$searchQuery->bindValue(3, "%".$_searchInput."%", PDO::PARAM_STR);
				} else if ($_rateInput != "0" && $_suburbInput == "0" && $_searchInput == "") { // if only the rate input has changed
					$searchQuery = $pdo->prepare("SELECT it.*, rt.averageRating FROM items AS it JOIN (SELECT ID, itemID, AVG(rating) AS averageRating FROM reviews GROUP BY itemID) AS rt ON it.ID = rt.itemID WHERE rt.averageRating >= ? ");
					$searchQuery->bindValue(1, $_rateInput, PDO::PARAM_INT);
				}  else { // if all fields have changed
					$searchQuery = $pdo->prepare("SELECT it.*, rt.averageRating FROM items AS it JOIN (SELECT ID, itemID, AVG(rating) AS averageRating FROM reviews GROUP BY itemID) AS rt ON it.ID = rt.itemID WHERE rt.averageRating >= ? AND it.suburb LIKE ? AND (address LIKE ? OR name LIKE ?)");

					$searchQuery->bindValue(1, $_rateInput, PDO::PARAM_INT);
					$searchQuery->bindValue(2, "%" .$formattedSub."%", PDO::PARAM_STR);	
					$searchQuery->bindValue(3, "%".$_searchInput."%", PDO::PARAM_STR);
					$searchQuery->bindValue(4, "%".$_searchInput."%", PDO::PARAM_STR);
				}

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