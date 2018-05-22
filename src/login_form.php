<form action="login.php" method="post" onsubmit="return Login(this);">
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

    <input type="submit" name="Login" value="Login">
</form>