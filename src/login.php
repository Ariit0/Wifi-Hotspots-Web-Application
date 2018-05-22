<!DOCTYPE html>
<html>
	<?php
		$title = "Login";
		include "include/header.php";
	?>
	<body>

	<div class="nav_bar">
		<?php
			include "displayNavBar.php";
		?>
		<div id="wrapper">
			<div id="header">
				<h1>Login</h1>
			</div>
					
			<div id="content">
		       <form action="#" onsubmit="return Login(this);">
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
	</div>

	</body>

</html>