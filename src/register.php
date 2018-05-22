<!DOCTYPE html>
<html>
	<?php
		$title = "Register";
		include "include/header.php";
	?>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1> Yelp Clone </h1>
			</div>
			
			<div id="menu">
				<a href="index.php">Home</a><a href="login.php">Login</a><a href="register.php" class="selected">Register</a><a href="aboutus.php">About</a><a href="contactus.php">Contact</a>
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