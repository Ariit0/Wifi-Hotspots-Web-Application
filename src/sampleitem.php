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

										<p><a href="write_review.php" id="writeReview"> Write a Review</a><p>
									</div>
									<hr>
								</li>
								<li>
									<div>							
										<img src="img/reviewtempbank(mustreplace).png" alt="reviewer">

										<p>Amazing 10/10 would come again</p>
									</div>
									<hr>
								</li>
								<li>
									<div>							
										<img src="img/reviewtempbank(mustreplace).png" alt="reviewer">

										<p>5/7 pretty nice</p>
									</div>
									<hr>
								</li>
								<li>
									<div>							
										<img src="img/reviewtempbank(mustreplace).png" alt="reviewer">

										<p>I couldn't get any wifi access</p>
									</div>
									<hr>
								</li>
								<li>
									<div>							
										<img src="img/reviewtempbank(mustreplace).png" alt="reviewer">

										<p>hard coded reviews are great</p>
									</div>
									<hr>
								</li>
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