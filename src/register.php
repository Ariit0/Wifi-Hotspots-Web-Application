<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="register.js"></script>

		<title>Register</title>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<h1> Yelp Clone </h1>
			</div>
			
			<div id="menu">
				<a href="index.html">Home</a><a href="login.php">Login</a><a href="register.php" class="selected">Register</a><a href="aboutus.html">About</a><a href="contactus.html">Contact</a>
			</div>
			
			<div id="content">
		       <form action="#" onsubmit="return Validate(this);">
		       		<h2>Register a New Account</h2>
		       		Already have an account? <a href="login.php">Login here.</a>
		       		<br><br>

		       		<p>
			            First name* <br>
			            <input id="firstname" type="text" onchange="OnChangeElement('firstnameError');" onkeypress="OnChangeElement('firstnameError');">
			            <span id="firstnameError" class="error-message"> First name error goes here.</span>
		        	</p>

		        	<p>
			            Last name <br>
			            <input id="lastname" type="text" onchange="OnChangeElement('lastnameError');" onkeypress="OnChangeElement('lastnameError');">
			            <span id="lastnameError" class="error-message"> Last name error goes here.</span>
		        	</p>

		        	<p>
			            DoB <br>
			            <input id="dob" type="text" placeholder="dd/mm/yyyy" onchange="OnChangeElement('dobError');" onkeypress="OnChangeElement('dobError');">
			            <span id="dobError" class="error-message"> Date of birth error goes here.</span>
		        	</p>

		     		<p>
			            Mobile number <br>
			            <input id="mobilenum" type="text" placeholder="0123456789" onchange="OnChangeElement('mobilenumError');" onkeypress="OnChangeElement('mobilenumError');">
			            <span id="mobilenumError" class="error-message"> Mobile number error goes here.</span>
		        	</p>

		        	<p>
			            Email* <br> 
			            <input id="emailaddress" type="text" onchange="OnChangeElement('emailError');" onkeypress="OnChangeElement('emailError');">
			            <span id="emailError" class="error-message"> Email error goes here.</span>
		        	</p>

		        	<p>
			            Password* <br>
			            <input type="password" name="password1" onchange="OnChangeElement('passwordError');" onkeypress="OnChangeElement('passwordError');">
			            <span id="passwordError" class="error-message"> Password error goes here.</span>
			        </p>

			        <p>
			            Confirm Password* <br>
			            <input type="password" name="password2" onchange="OnChangeElement('passwordmatchError');" onkeypress="OnChangeElement('passwordmatchError');">
			            <span id="passwordmatchError" class="error-message"> Password match error goes here.</span>
		        	</p>

		        	<br>

		            <input type="submit" value="Create Account">
		        </form>
			</div>
			
			<div id="footer">
				<p>Ari Luangamath (n9446826) & George Delosa (n9751696) </p>
				<a href="https://github.com/Ariit0/CAB230-Assessment" target="_blank"> Link to GitHub Repo</a>
			</div>
		</div>

	</body>

</html>