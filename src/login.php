<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="login.js"></script>

		<title>Login</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1> Yelp Clone </h1>
			</div>
			
			<div id="menu">
				<a href="index.html">Home</a><a href="login.php" class="selected">Login</a><a href="register.php">Register</a><a href="aboutus.html">About</a><a href="contactus.html">Contact</a>
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
			
			<div id="footer">
				<p>Ari Luangamath (n9446826) & George Delosa (n9751696) </p>
				<a href="https://github.com/Ariit0/CAB230-Assessment" target="_blank"> Link to GitHub Repo</a>
			</div>
		</div>

	</body>

</html>