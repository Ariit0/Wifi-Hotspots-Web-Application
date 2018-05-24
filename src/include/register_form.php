<form action="register.php" method="post" onsubmit="return ValidateRegisterForm_Client(this);">
	<h2>Register a New Account</h2>
	Already have an account? <a href="login.php">Login here.</a>
	<br><br>

	<p>
        First name* <br>
        <input id="firstname" name="firstname" type="text" onchange="OnChangeElement('firstnameErrorID');" onkeypress="OnChangeElement('firstnameErrorID');">
        <span id="firstnameErrorID" class="error-message"> First name error goes here.</span>
	</p>

	<p>
        Last name <br>
        <input id="lastname" name="lastname" type="text" onchange="OnChangeElement('lastnameErrorID');" onkeypress="OnChangeElement('lastnameErrorID');">
        <span id="lastnameErrorID" class="error-message"> Last name error goes here.</span>
	</p>

	<p>
        DoB <br>
        <input id="dob" name="dob" type="text" placeholder="dd/mm/yyyy" onchange="OnChangeElement('dobErrorID');" onkeypress="OnChangeElement('dobErrorID');">
        <span id="dobErrorID" class="error-message"> Date of birth error goes here.</span>
	</p>

	<p>
        Mobile number <br>
        <input id="mobile" name="mobile" type="text" placeholder="0123456789" onchange="OnChangeElement('mobilenumErrorID');" onkeypress="OnChangeElement('mobilenumErrorID');">
        <span id="mobilenumErrorID" class="error-message"> Mobile number error goes here.</span>
	</p>

	<p>
        Email* <br> 
        <input id="email" name="email" type="text" onchange="OnChangeElement('emailErrorID');" onkeypress="OnChangeElement('emailErrorID');">
        <span id="emailErrorID" class="error-message"> Email error goes here.</span>
	</p>

	<p>
        Password* <br>
        <input type="password" name="password1" onchange="OnChangeElement('passwordErrorID');" onkeypress="OnChangeElement('passwordErrorID');">
        <span id="passwordErrorID" class="error-message"> Password error goes here.</span>
    </p>

    <p>
        Confirm Password* <br>
        <input type="password" name="password2" onchange="OnChangeElement('passwordmatchErrorID');" onkeypress="OnChangeElement('passwordmatchErrorID');">
        <span id="passwordmatchErrorID" class="error-message"> Password match error goes here.</span>
	</p>

	<br>

    <input type="submit" name="Register" value="Create Account">
</form>