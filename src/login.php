<!DOCTYPE html>
<html>
	<?php
		$title = "Login";
		include "include/header.php";
	?>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1> Yelp Clone </h1>
			</div>
			
			<div id="menu">
				<a href="index.php">Home</a><a href="login.php" class="selected">Login</a><a href="register.php">Register</a><a href="aboutus.php">About</a><a href="contactus.php">Contact</a>
			</div>
					
			<div id="content">
		       <form action="#" onsubmit="return Login(this);">
		       		<h2>Login to an Existing Account</h2>
		       		Don't have an account? <a href="register.php">Sign up here.</a>
		       		<br><br>

		       		<p>
			            Email <br>
			            <input id="emailaddress" type="text" onchange="OnChangeElement('emailError');" onkeypress="OnChangeElement('emailError');" >
			            <span id="emailError" class="error-message"> Email error goes here.</span>
		        	</p>

		        	<p>
			            Password <br>
			            <input type="password" name="password" onchange="OnChangeElement('passwordError');" onkeypress="OnChangeElement('passwordError');">
			            <span id="passwordError" class="error-message"> Password error goes here.</span>
		        	</p>

		        	<br>

		            <input type="submit" value="Login">
		        </form>
			</div>
			
			<?php
				include "include/footer.php";
			?>
		</div>

	</body>

</html>