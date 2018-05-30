<!DOCTYPE html>
<html>
	<head>
		<title>Write a review</title>
		<?php
			include "include/header.php";

			// Redirect user to the home page if they are not logged in (should not be possible to access write_review page if not logged in)
			if(!isset($_SESSION['userID'])) {
		    	header(SITE_PATH ."/login.php");
			}
		?>
		<script type="text/javascript" src="js/general_validation.js"></script>
		<script type="text/javascript" src="js/review_client_validation.js"></script>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "include/displayNavBar.php";
			?>
		</div>
		
		<div id="wrapper">
			<div id="header">
				<h1>Write a Review</h1>
			</div>
			
			<div id="content">
				<?php
					// If the form from review_form.php was submitted successfully...
					if (isset($_POST['Submit'])) {
						$description = $rating = '';
						$server_msg = '';

						// Validate data on the server-side
						require 'include/review_server_validation.php';
						if(ValidateReviewForm_Server()) {

							// If validation passed, now attempt to create the review.
							if(TryCreateReview($_SESSION['currentItemID'], $_SESSION['userID'], $rating, $description)){
				            	echo 'Review created successfully! <a href="sampleitem.php">Click here to return to '. $_SESSION['currentItemName'] .'</a>';
							} else {
								echo 'Server error: Review creation failed, please try again later.';
							}
				        } else {
				        	// If the server_response_msg is not empty, then it will tell the user what they did wrong, otherwise it is assumed JS was disabled.
				        	if($server_msg === '') {
				            	echo 'The server has detected invalid input data. Ensure JS is enabled on your browser before submitting for more information.';
				        	} else {
				        		echo $server_msg;
				        	}
				        }
				    } else {

				    	// If the form has not been submitted yet, display the page as normal with the form.
				    	echo "<h2>". $_SESSION['currentItemName'] ."</h2>";
						include "include/review_form.php";
				    }
				?>
			</div>

			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>