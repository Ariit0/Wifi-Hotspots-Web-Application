<?php 
	$itemID = $_POST['hidden-id'];
	$itemName = $_POST['hidden-name'];
?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Results";
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
				<h1> Result 1 </h1>
			</div>

			<div id="content">
				<div id="resultContainer">
					<div id="initMap"></div>
					<!-- google api call for google maps, must be called here -->
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeDXwaLc0EQeMCbofBs7OwhOU32X4fY1E&callback=initMap"></script>
				</div> <!-- end resultContainer -->

				<div id="reviewBanner">
					<h3>Reviews</h3>
				</div>
				
				<div id="reviewContainer">
					<div id="reviewList">
						<div class="reviews">
							<ul>
								<li>
									<div>							
										<img src="img/reviewtempbank(mustreplace).png" alt="reviewer">
										<?php
											$_SESSION['currentItemID'] = $itemID;
											// Add spaces before each capital letter in the name.
											$_SESSION['currentItemName'] = preg_replace('/(?<!\ )[A-Z]/', ' $0', $itemName);
										?>
										<p><a href="write_review.php" id="writeReview"> Write a Review</a><p>
									</div>
									<hr>
								</li>

								<?php
									require_once 'include/initDB.php';

							        $stmt = $pdo->prepare('SELECT firstName, LastName, dateOfReview, description, rating, userID, itemID  '.
							        	'FROM members INNER JOIN reviews '.
							        	'WHERE reviews.itemID = :itemID AND members.ID = reviews.userID');
							        $stmt->bindValue(":itemID", $itemID);

							        if($stmt->execute()) {
										foreach ($stmt as $review) {
											echo '<li>';
											echo '<div>';

											echo '<img src="img/reviewtempbank(mustreplace).png" alt="reviewer">';

											echo '<p>';
											echo "<b>". $review['firstName'] ."</b> | ". $review['dateOfReview'] ."<br>";
											echo "Rating: ". $review['rating'] ."&nbsp;&#xf005;<br><br>";
											echo $review['description'];
											echo '</p>';

											echo '</div>';
											echo '</li>';

											echo '<hr>';
										}
									}
								?>
							</ul>
						</div>
					</div>
				</div>
				<br>
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>