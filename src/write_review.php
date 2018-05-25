<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Write a review";
			include "include/header.php";

			if(!isset($_SESSION['userID'])) {
		    	header("Location: http://{$_SERVER['HTTP_HOST']}/CAB230/src/login.php");
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
					if (isset($_POST['Submit'])) {
						$description = $rating = '';
						$server_msg = '';

						require 'include/review_server_validation.php';
						if(ValidateReviewForm_Server()) {
							if(TryCreateReview($_SESSION['currentItemID'], $_SESSION['userID'], $rating, $description)){
				            	echo 'Review created successfully! Click here to return to '. $_SESSION['currentItemName'];
							} else {
								echo 'Server error: Review creation failed, please try again later.';
							}
				        } else {
				        	if($server_msg === '') {
				            	echo 'The server has detected invalid input data. Ensure JS is enabled on your browser before submitting for more information.';
				        	} else {
				        		echo $server_msg;
				        	}
				        }
				    } else {
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