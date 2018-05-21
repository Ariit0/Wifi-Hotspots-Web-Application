<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- using fontawesome for icon fonts -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<script type="text/javascript" src="results.js"></script>

		<title>Result</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1> Yelp Clone </h1>
			</div>
			
			<div id="menu">
				<a href="index.html" class="selected">Home</a><a href="login.php">Login</a><a href="register.php">Register</a><a href="aboutus.html">About</a><a href="contactus.html">Contact</a>
			</div>
			

			<div id="content">
				<h2>Result 1</h2>
				<h4>A place to discover and review WiFi Hotspots near you.</h4>

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
			
			<div id="footer">
				<p>Ari Luangamath (n9446826) & George Delosa (n9751696) </p>
				<a href="https://github.com/Ariit0/CAB230-Assessment" target="_blank"> Link to GitHub Repo</a>
			</div>
		</div>

	</body>

</html>