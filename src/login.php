<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Login";
			include "include/header.php";
		?>
		<script type="text/javascript" src="js/login.js"></script>
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
					if (isset($_POST['Login'])) {
				        //Server side validation
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