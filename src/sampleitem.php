<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Results";
			include "include/header.php";

			// If the user has arrived to this page from clicking a hotspot search result, get that hotspot information from hidden fields.
 			// Otherwise, re-use the last hotspot information (occurs when user is returning from writing a review for that hotspot).
			if(isset($_POST['hidden-id'])){
				$_SESSION['currentItemID'] = $_POST['hidden-id'];
			}

			if(isset($_POST['hidden-name'])) {
				echo "<input type=\"hidden\" id=\"hidden-itemname\" value=\"".$_POST['hidden-name']."\" />";
				// Add spaces before each capital letter in the name.
				$_SESSION['currentItemName'] = preg_replace('/(?<!\ )[A-Z]/', ' $0', $_POST['hidden-name']);
			}

			if (isset($_POST['hidden-lat'])) {
				echo "<input type=\"hidden\" id=\"hidden-itemlat\" value=\"".$_POST['hidden-lat']."\" />";
			}

			if (isset($_POST['hidden-lng'])) {
				echo "<input type=\"hidden\" id=\"hidden-itemlng\" value=\"".$_POST['hidden-lng']."\" />";
			}
		?>
			<script type="text/javascript" src="js/sample_item.js"></script>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "include/displayNavBar.php";
			?>
		</div>

		<div id="wrapper">
			<div id="header">
				<h1> <?php echo $_SESSION['currentItemName']; ?> </h1>
			</div>

			<div id="content">
				<div id="reviewBanner">
					<h3>Reviews</h3>
				</div>
				
				<div id="reviewContainer">
					<div id="reviewList">
						<div class="reviews">
							<ul id="revComments">
								<li>
									<div>							
										<img src="img/reviewblank.png" alt="reviewer">
										<?php
											if(isset($_SESSION['userID'])) {
												echo '<p id="write"><a href="write_review.php" id="writeReview"> Write a review!</a><p>';
											} else {
												echo '<p><a href="login.php" id="writeReview"> Log in to write a review</a><p>';
											}
										?>
									</div>
									<hr>
								</li>

								<?php
									require_once 'include/initDB.php';

							        $stmt = $pdo->prepare('SELECT '.
							        	'members.firstName, members.LastName, reviews.userID, reviews.itemID, reviews.description, reviews.rating, reviews.dateOfReview  '.
							        	'FROM reviews INNER JOIN members ON reviews.userID = members.ID WHERE itemID = :itemID');
							        $stmt->bindValue(":itemID", $_SESSION['currentItemID']);

							        if($stmt->execute()) {
										foreach ($stmt as $review) {
											echo '<li>';
											echo '<div>';

											echo '<p class=\'review\'>';
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
				<div id="mapResultContainer">
					<div class="sampleResultMap" id="initMap"></div>
					<!-- google api call for google maps, must be called here -->
					<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeDXwaLc0EQeMCbofBs7OwhOU32X4fY1E&callback=initMap"></script>
				</div> <!-- end resultContainer -->
		</div>
	</body>
</html>