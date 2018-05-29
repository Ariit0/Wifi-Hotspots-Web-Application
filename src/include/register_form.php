<form action="register.php" method="post" onsubmit="return ValidateRegisterForm_Client(this);">
	<h2>Register a New Account</h2>
	Already have an account? <a href="login.php">Login here.</a>
	<br>

	<p>
        <span id="serverResponseErrorID" style="color:red"><?php echo $server_response_msg; ?></span><br><br>

        First name* <br>
        <input id="firstname" name="firstname" type="text" value="<?php if(isset($firstname)) echo $firstname; ?>" 
        onchange="OnChangeElement('firstnameErrorID');" onkeypress="OnChangeElement('firstnameErrorID');">
        <span id="firstnameErrorID" class="error-message"> First name error goes here.</span>
	</p>

	<p>
        Last name <br>
        <input id="lastname" name="lastname" type="text" value="<?php if(isset($lastname)) echo $lastname; ?>"
        onchange="OnChangeElement('lastnameErrorID');" onkeypress="OnChangeElement('lastnameErrorID');">
        <span id="lastnameErrorID" class="error-message"> Last name error goes here.</span>
	</p>

	<p>
        DoB <br>
        <input id="dob" name="dob" type="text" placeholder="dd/mm/yyyy" value="<?php if(isset($dob)) echo $dob; ?>"
        onchange="OnChangeElement('dobErrorID');" onkeypress="OnChangeElement('dobErrorID');">
        <span id="dobErrorID" class="error-message"> Date of birth error goes here.</span>
	</p>

	<p>
        Mobile number <br>
        <input id="mobile" name="mobile" type="text" placeholder="0123456789" value="<?php if(isset($mobile)) echo $mobile; ?>"
        onchange="OnChangeElement('mobilenumErrorID');" onkeypress="OnChangeElement('mobilenumErrorID');">
        <span id="mobilenumErrorID" class="error-message"> Mobile number error goes here.</span>
	</p>

    <p>
        Gender <br>
        <input id="gender" name="gender" type="radio" value="1" <?php if(isset($gender) && $gender === "1") echo "checked"; ?>> Male
        <input id="gender" name="gender" type="radio" value="2" <?php if(isset($gender) && $gender === "2") echo "checked"; ?>> Female
        <input id="gender" name="gender" type="radio" value="3" <?php if(isset($gender) && $gender === "3") echo "checked"; ?>> Other
    </p>

    <p>
        About me <br>
        <textarea id="bio" name="bio" rows="6" cols="60" onchange="OnChangeElement('bioErrorID');" 
        onkeypress="OnChangeElement('bioErrorID');"><?php if(isset($bio)) echo $bio; ?></textarea>
        <span id="bioErrorID" class="error-message"> Bio error goes here.</span><br>
    </p>

	<p>
        Email* <br> 
        <input id="email" name="email" type="text" value="<?php if(isset($email)) echo $email; ?>"
        onchange="OnChangeElement('emailErrorID');" onkeypress="OnChangeElement('emailErrorID');">
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

    <p>
        <input type="checkbox" id="termsOfServiceCheckBoxID" name="termsOfServiceCheckBox" onclick="OnChangeElement('termsErrorID');"> I agree to to WifiFinder's Terms of Service.
        <span id="termsErrorID" class="error-message"> Terms of service error goes here.</span>
    </p>

    <br>

    <input type="submit" name="Register" value="Create Account">
</form>