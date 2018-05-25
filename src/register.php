<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Register";
			include "include/header.php";

			if(isset($_SESSION['userID'])) {
		    	header("Location: http://{$_SERVER['HTTP_HOST']}/CAB230/src/index.php");
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
					if (isset($_POST['Register'])) {
						$firstname = $lastname = $dob = $mobile = $email = $password = $confirm_password = '';
						$server_msg = '';

						require 'include/register_server_validation.php';
						if(ValidateRegisterForm_Server()) {
							if(TryRegister($firstname, $lastname, $dob, $mobile, $email, $password)){
				            	echo 'Registration successful! <a href="login.php">Click here to login.</a>';
							} else {
								echo 'Server error: registration failed, please try again later.<br><br>';
							}
				        } else {
				        	if($server_msg === '') {
				            	echo 'The server has detected invalid input data. Ensure JS is enabled on your browser before submitting for more information.<br><br>';
				        	} else {
				        		echo $server_msg;
				        	}
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