<?php
	if (isset($_POST["search"])) {
		$_searchInput = $_POST['srch'];
		$_rateInput = $_POST['rating'];
		$_suburbInput = $_POST['suburb'];
		
		include 'include/initDB.php';

		try {
			$searchQuery = $pdo->prepare("SELECT address, suburb FROM items WHERE suburb LIKE '%bris%' ");
			$searchQuery->execute();

			foreach ($searchQuery as $suburb) {
				echo $suburb['suburb'];
			}

		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	} else {
		echo "errors";
	}
?>