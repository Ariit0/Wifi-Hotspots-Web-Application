<form action="login.php" method="post" onsubmit="return ValidateLoginForm_Client(this);">
	<h2>Login to an Existing Account</h2>
	Don't have an account? <a href="register.php">Sign up here.</a>
	<br><br>

	<p>
		<?php echo $server_response_msg; ?>
        Email <br>
        <input id="emailaddress" name="emailaddress" type="text" onchange="OnChangeElement('emailErrorID');" onkeypress="OnChangeElement('emailErrorID');" >
        <span id="emailErrorID" class="error-message"></span>
	</p>

	<p>
        Password <br>
        <input id="password" type="password" name="password" value="" onchange="OnChangeElement('passwordErrorID');" onkeypress="OnChangeElement('passwordErrorID');">
        <span id="passwordErrorID" class="error-message"></span>
	</p>

	<br>

    <input type="submit" name="Login" value="Login">
</form>