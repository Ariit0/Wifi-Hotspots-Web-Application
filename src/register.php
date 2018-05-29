<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<?php
			include "include/header.php";

			// Redirect user to the home page if they are logged in (should not be possible to access register page if already logged in)
			if(isset($_SESSION['userID'])) {
		    	header(SITE_PATH ."/index.php");
			}
		?>
		<script type="text/javascript" src="js/general_validation.js"></script>
		<script type="text/javascript" src="js/register_client_validation.js"></script>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "include/displayNavBar.php";
			?>
		</div>
		
		<div id="wrapper">
			<div id="header">
				<h1>Register</h1>
			</div>
			
			<div id="content">
				<?php
					$server_response_msg = '';

					// If the form from register_form.php was submitted successfully...
					if (isset($_POST['Register'])) {
						$firstname = $lastname = $dob = $mobile = $gender = $bio = $email = $password = $confirm_password = '';

						// Validate data on the server-side
						require 'include/register_server_validation.php';
						if(ValidateRegisterForm_Server()) {

							// If validation passed, now attempt to register the user.
							if(TryRegister($firstname, $lastname, $dob, $mobile, $gender, $bio, $email, $password)){
				            	echo 'Registration successful! <a href="login.php">Click here to login.</a>';
							} else {
								echo 'Server error: registration failed, please try again later.';
							}
				        } else {
				        	// If server side validation failed, re-display the form with pre-filled values, alongside a server_response_msg
				        	// If the server_response_msg is not empty, then it will tell the user what they did wrong, otherwise it is assumed JS was disabled.
				        	if($server_response_msg === '') {
				            	$server_response_msg = 'The server has detected invalid input data. Ensure JS is enabled on your browser before submitting for more information.';
				        	} 
							include "include/register_form.php";
				        }
				    } else {
						include "include/register_form.php";
				    }
				?>
			</div>

			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>