// Validate the form by checking against all tests.
function ValidateRegisterForm_Client(form) {
    isValid = true;

    // Validate firstname: REQUIRED and alphabetic only
    if(CheckValueNotEmpty(form.firstname.value) === false) {
        DisplayError("firstnameErrorID", "First name is a required field.");
        isValid = false;
    } else if (CheckValueAlphabeticOnly(form.firstname.value) === false) {
        DisplayError("firstnameErrorID", "First name must be alphabetic only.");
        isValid = false;
    }

    // Validate lastname: OPTIONAL and alphabetic only
    if (CheckValueNotEmpty(form.lastname.value) && CheckValueAlphabeticOnly(form.lastname.value) === false) {
        DisplayError("lastnameErrorID", "Last name must be alphabetic only.");
        isValid = false;
    }

    // Validate date of birth: OPTIONAL and must be of format dd/mm/yyyy
    if (CheckValueNotEmpty(form.dob.value) && CheckValidDate(form.dob.value) === false) {
        DisplayError("dobErrorID", "Date of birth must follow the correct format (dd/mm/yyyy).");
        isValid = false;
    }

    // Validate mobile number: OPTIONAL and must contain 10 digits
    if (CheckValueNotEmpty(form.mobile.value) && CheckValidMobileNumber(form.mobile.value) === false) {
        DisplayError("mobilenumErrorID", "Mobile number must be 10 digits.");
        isValid = false;
    }

    // Validate email address: REQUIRED and must be of an email format
    if(CheckValueNotEmpty(form.email.value) === false) {
        DisplayError("emailErrorID", "Email is a required field.");
        isValid = false;
    } else if (CheckValidEmail(form.email.value) === false) {
        DisplayError("emailErrorID", "Please use the correct format for an email address.");
        isValid = false;
    }

    // Validate password: REQUIRED, must MATCH confirmation password, and must follow a general FORMAT
    if(CheckValidPassword(form.password1.value) === false){
        DisplayError("passwordErrorID", "Password must be at least 8 characters long, with at least 1 being uppercase, 1 lowercase, and 1 number.");
        isValid = false;
    } else if (CheckPasswordsMatch(form.password1.value, form.password2.value) === false){
        DisplayError("passwordmatchErrorID", "Passwords do not match.");
        isValid = false;
    }

    // Validate Terms of Service checkbox: MUST BE CHECKED
    if(!document.getElementById('termsOfServiceCheckBoxID').checked) {
        DisplayError("termsErrorID", "You must agree to the terms of service to register.");
        isValid = false;
    }

    return isValid;
}