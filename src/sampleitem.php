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
				include "displayNavBar.php";
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

					<div id="resultList">
						<div class="results">
							<h1>Result 1</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tortor ex, dictum sit amet finibus tristique, pharetra a lacus. Ut gravida turpis ultrices, varius lacus at, consequat nisi. Vivamus tempor diam id nulla fringilla molestie. Fusce sed dui euismod, pulvinar diam id, cursus ex. Nulla facilisi. Quisque vitae massa dapibus neque congue auctor in vitae nunc. Pellentesque egestas purus sed diam sodales viverra. Maecenas vulputate, enim sit amet vulputate dapibus, metus sapien laoreet lorem, vel mollis orci sapien sit amet ante. Nulla facilisi. Vestibulum varius rutrum mauris a pretium. Donec quis massa condimentum, malesuada mi id, iaculis urna.

							Cras quis tortor laoreet, tempor erat quis, ultricies mi. Proin bibendum, nulla et hendrerit porta, quam nisl bibendum felis, non sagittis diam enim ac felis. Praesent sagittis erat blandit dolor scelerisque, nec pharetra tellus fermentum. Nam nibh enim, consequat fringilla aliquet quis, efficitur condimentum sem. Suspendisse neque massa, congue sed blandit iaculis, egestas vitae nisi. Phasellus eu nulla id tortor rutrum luctus. Mauris tincidunt lacus vitae eleifend euismod. Nulla laoreet commodo mi id accumsan. 
						</div> <!-- end results -->
					</div> <!-- end resultList -->
				</div> <!-- end resultwrapper -->

				<div id="reviewBanner"><h3>Review</h3></div>
				<div id="reviewContainer">
					<div id="reviewList">
						<div class="reviews">
							<ul>
								<li>
									<div>							
										<img src="img/reviewtempbank(mustreplace).png" alt="reviewer">

										<a href="#" id="writeReview"> Write a Review</a>
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