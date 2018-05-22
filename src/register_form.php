<form action="register.php" method="post" onsubmit="return ValidateRegisterForm_Client(this);">
	<h2>Register a New Account</h2>
	Already have an account? <a href="login.php">Login here.</a>
	<br><br>

	<p>
        <?php echo $server_response_msg; ?>
        First name* <br>
        <input id="firstname" type="text" onchange="OnChangeElement('firstnameError');" onkeypress="OnChangeElement('firstnameError');">
        <span id="firstnameErrorID" class="error-message"> First name error goes here.</span>
	</p>

	<p>
        Last name <br>
        <input id="lastname" type="text" onchange="OnChangeElement('lastnameError');" onkeypress="OnChangeElement('lastnameError');">
        <span id="lastnameErrorID" class="error-message"> Last name error goes here.</span>
	</p>

	<p>
        DoB <br>
        <input id="dob" type="text" placeholder="dd/mm/yyyy" onchange="OnChangeElement('dobError');" onkeypress="OnChangeElement('dobError');">
        <span id="dobErrorID" class="error-message"> Date of birth error goes here.</span>
	</p>

	<p>
        Mobile number <br>
        <input id="mobile" type="text" placeholder="0123456789" onchange="OnChangeElement('mobilenumError');" onkeypress="OnChangeElement('mobilenumError');">
        <span id="mobilenumErrorID" class="error-message"> Mobile number error goes here.</span>
	</p>

	<p>
        Email* <br> 
        <input id="email" type="text" onchange="OnChangeElement('emailError');" onkeypress="OnChangeElement('emailError');">
        <span id="emailErrorID" class="error-message"> Email error goes here.</span>
	</p>

	<p>
        Password* <br>
        <input type="password" name="password1" onchange="OnChangeElement('passwordError');" onkeypress="OnChangeElement('passwordError');">
        <span id="passwordErrorID" class="error-message"> Password error goes here.</span>
    </p>

    <p>
        Confirm Password* <br>
        <input type="password" name="password2" onchange="OnChangeElement('passwordmatchError');" onkeypress="OnChangeElement('passwordmatchError');">
        <span id="passwordmatchErrorID" class="error-message"> Password match error goes here.</span>
	</p>

	<br>

    <input type="submit" name="Register" value="Create Account">
</form>