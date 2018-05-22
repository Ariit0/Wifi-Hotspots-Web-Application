<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Register";
			include "include/header.php";
		?>
		<script type="text/javascript" src="js/register_client_validation.js"></script>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "displayNavBar.php";
			?>
		</div>
		
		<div id="wrapper">
			<div id="header">
				<h1>Register</h1>
			</div>
			
			<div id="content">
				<?php
					$server_response_msg = '';

					if (isset($_POST['Register'])) {
						$firstname = $lastname = $dob = $mobile = $email = $password = $confirm_password = '';

						require 'register_server_validation.php';
						if(ValidateRegisterForm_Server()) {
							if(TryRegister($firstname, $lastname, $dob, $mobile, $email, $password)){
				            	echo 'we registered boys';
							} else {
								echo 'Server error: registration failed, please try again later.<br><br>';
							}
				        } else {
				            $server_response_msg = 'Invalid data.<br><br>';
							include "register_form.php";
				        }
				    } else {
						include "register_form.php";
				    }
				?>
			</div>

			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>