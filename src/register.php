<!DOCTYPE html>
<html>
	<head>
		<?php
			$title = "Register";
			include "include/header.php";
		?>
		<script type="text/javascript" src="js/register.js"></script>
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
					if (isset($_POST['Register'])) {
				        //Server side validation
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