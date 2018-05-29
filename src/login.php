<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<?php
			include "include/header.php";

			// Redirect user to the home page if they are logged in (should not be possible to access login page if already logged in)
			if(isset($_SESSION['userID'])) {
		    	header(SITE_PATH ."/index.php");
			}
		?>
		<script type="text/javascript" src="js/general_validation.js"></script>
		<script type="text/javascript" src="js/login_client_validation.js"></script>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "include/displayNavBar.php";
			?>
		</div>

		<div id="wrapper">
			<div id="header">
				<h1>Login</h1>
			</div>
					
			<div id="content">
				<?php
					$server_response_msg = '';

					// If the form from login_form.php was submitted successfully...
					if (isset($_POST['Login'])) {
						$emailaddress = $password = '';

						// Validate data on the server-side
						require 'include/login_server_validation.php';
						if(ValidateLoginForm_Server()) {

							// If validation passed, now attempt to log in the user.
							$userID = TryLogin($emailaddress, $password);
							if(!is_null($userID)) {

								// Login successful! Store the user's id into the session and redirect them to the home page.
								session_start();
				                $_SESSION['userID'] = $userID;
                				header(SITE_PATH ."/index.php");
							} else if ($userID === -1) {

								// In all other cases, display appropriate error message and pre-fill the login form.
				                $server_response_msg = 'Failed to connect to server. Please try again later.';
								include "include/login_form.php";
				            } else {
				         		$server_response_msg = 'Incorrect credentials.';
								include "include/login_form.php";
				            }
				        } else {
				            $server_response_msg = 'Invalid data.';
							include "include/login_form.php";
				        }
				    } else {
						include "include/login_form.php";
				    }
				?>
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>