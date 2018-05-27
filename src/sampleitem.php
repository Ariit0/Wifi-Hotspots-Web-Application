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
				// Add spaces before each capital letter in the name.
				$_SESSION['currentItemName'] = preg_replace('/(?<!\ )[A-Z]/', ' $0', $_POST['hidden-name']);
			}
			echo "<input type=\"hidden\" id=\"hidden-itemname\" value=\"".$_SESSION['currentItemName']."\" />";

			if (isset($_POST['hidden-lat'])) {
				$_SESSION['currentLat'] = $_POST['hidden-lat'];
			}
			echo "<input type=\"hidden\" id=\"hidden-itemlat\" value=\"".$_SESSION['currentLat']."\" />";

			if (isset($_POST['hidden-lng'])) {
				$_SESSION['currentLng'] = $_POST['hidden-lng'];
			}
			echo "<input type=\"hidden\" id=\"hidden-itemlng\" value=\"".$_SESSION['currentLng']."\" />";
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

									$pdo = initDB();

									if(!is_null($pdo)) {
								        $stmt = $pdo->prepare('SELECT '.
								        	'members.firstName, members.LastName, reviews.userID, reviews.itemID, reviews.description, reviews.rating, reviews.dateOfReview  '.
								        	'FROM reviews INNER JOIN members ON reviews.userID = members.ID WHERE itemID = :itemID');
								        $stmt->bindValue(":itemID", $_SESSION['currentItemID']);

								        if($stmt->execute()) {
											foreach ($stmt as $review) {
												echo '<li>';
												echo '<div itemscope itemtype="http://schema.org/Review">';

												echo '<p class=\'review\'>';
												echo '<span hidden itemprop="itemreviewed">'. $_SESSION['currentItemName'] .'</span>';

												echo '<b itemprop="reviewer">'. $review['firstName'] .'</b>';
												echo ' | ';
												echo '<span itemprop="dtreviewed">'. $review['dateOfReview'] .'</span>';
												echo '<br>';

												echo 'Rating: ';
												echo '<span itemprop="rating">'. $review['rating'] .'</span>';
												echo '<span>&nbsp;&#xf005;</span><br><br>';

												echo '<span itemprop="description">'. $review['description'] .'</span>';

												echo '</p>';

												echo '</div>';
												echo '</li>';

												echo '<hr>';
											}
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
			
			<div id="mapResultContainer" itemscope itemtype="http://schema.org/Place">
				<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
					<?php echo '<meta itemprop="latitude" content="'. $_SESSION['currentLat'] .'"/>'; ?>
					<?php echo '<meta itemprop="longitude" content="'. $_SESSION['currentLng'] .'"/>'; ?>
				</div>

				<div class="sampleResultMap" id="initMap"></div>
				<!-- google api call for google maps, must be called here -->
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeDXwaLc0EQeMCbofBs7OwhOU32X4fY1E&callback=initMap"></script>
			</div> <!-- end resultContainer -->
		</div>
	</body>
</html>