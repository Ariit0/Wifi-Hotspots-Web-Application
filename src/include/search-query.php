<?php
	require_once 'displayResults.php';
	require_once 'sanitize_data.php';

	$_searchInput = sanitize_data($_POST['srch']);
	$_rateInput = sanitize_data($_POST['rating']);
	$_suburbInput = sanitize_data($_POST['suburb']);
	$_getLat = sanitize_data($_POST['lat']);
	$_getLong = sanitize_data($_POST['long']);
	// Adds a space before each captial letter (excluding the first letter), and remove whitespace from the left.
	$formattedSub = ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', $_suburbInput));
	
	require_once 'include/initDB.php';

	$pdo = initDB();

	try { 
		// If near me option is selected, get user's geo location and search based on longitude and latitude
		if ($_suburbInput == "NearMe") {
			// Used to set a arbitrary range for near me location
			$_latUpper = floatval($_getLat) + 0.12;
			$_latLower = floatval($_getLat) - 0.12;
			$_loUpper = floatval($_getLong) + 0.12;
			$_loLower = floatval($_getLong) - 0.12;

			// Search query which is sent to the db, checks for any items which rating is greater than the rate input and checks for areas which are within its arbitrary range
			// Does not consider search input, only rating input. 
			if ($_rateInput != 0) {	
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

			// If all fields are set at default, query all results
			if ($_suburbInput == "0" && $_searchInput == "" && $_rateInput == "0") { 
				$searchQuery = $pdo->prepare("SELECT * FROM items");

			// If there's search input, but suburb + rate value still default
			} else if ($_suburbInput == "0" && $_rateInput == "0") { 
				$searchQuery = $pdo->prepare("SELECT * FROM items WHERE (address LIKE ? OR name LIKE ?)");
				$searchQuery->bindValue(1, "%".$_searchInput."%", PDO::PARAM_STR);
				$searchQuery->bindValue(2, "%".$_searchInput."%", PDO::PARAM_STR);

			// If there's suburb input, but search + rate input is default
			} else if ($_searchInput == "" && $_rateInput == "0") { 
				$searchQuery = $pdo->prepare("SELECT * FROM items WHERE suburb LIKE ?");
				$searchQuery->bindValue(1, "%" .$formattedSub."%", PDO::PARAM_STR);	

			// Search and suburb input not at its default value but rating is left alone
			} else if ($_rateInput == "0") { 
				$searchQuery = $pdo->prepare("SELECT * FROM items WHERE suburb LIKE ? AND (address LIKE ? OR name LIKE ?)");
				$searchQuery->bindValue(1, "%" .$formattedSub."%", PDO::PARAM_STR);	
				$searchQuery->bindValue(2, "%".$_searchInput."%", PDO::PARAM_STR);
				$searchQuery->bindValue(3, "%".$_searchInput."%", PDO::PARAM_STR);

			// If only the rate input has changed
			} else if ($_rateInput != "0" && $_suburbInput == "0" && $_searchInput == "") { 
				$searchQuery = $pdo->prepare("SELECT it.*, rt.averageRating FROM items AS it JOIN (SELECT ID, itemID, AVG(rating) AS averageRating FROM reviews GROUP BY itemID) AS rt ON it.ID = rt.itemID WHERE rt.averageRating >= ? ");
				$searchQuery->bindValue(1, $_rateInput, PDO::PARAM_INT);

			// If all fields have changed
			}  else { 
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

	}
?>