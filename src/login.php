<?php 
	session_start(); 
	if(isset($_SESSION['LoggedInEmail'])) {
    	header("Location: http://{$_SERVER['HTTP_HOST']}/CAB230/src/index.php");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Login";
			include "include/header.php";
		?>
		<script type="text/javascript" src="js/login_client_validation.js"></script>
	</head>

	<body>
		<div class="nav_bar">
			<?php
				include "displayNavBar.php";
			?>
		</div>

		<div id="wrapper">
			<div id="header">
				<h1>Login</h1>
			</div>
					
			<div id="content">
				<?php
					$server_response_msg = '';

					if (isset($_POST['Login'])) {
						$emailaddress = $password = '';

						require 'login_server_validation.php';
						if(ValidateLoginForm_Server()) {
							if(TryLogin($emailaddress, $password)) {
								session_start();
				                $_SESSION['LoggedInEmail'] = $emailaddress;
                				header("Location: http://{$_SERVER['HTTP_HOST']}/CAB230/src/index.php");
							} else {
				                $server_response_msg = 'Incorrect credentials.<br><br>';
								include "login_form.php";
				            }
				        } else {
				            $server_response_msg = 'Invalid data.<br><br>';
							include "login_form.php";
				        }
				    } else {
						include "login_form.php";
				    }
				?>
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>
	</body>
</html>