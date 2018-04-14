// Validate the form by checking against all tests.
function Validate(form) {
    isValid = true;

    if(CheckValueNotEmpty(form.firstname.value) === false) {
        DisplayError("firstnameError", "First name is a required field.");
        isValid = false;
    }

    //// Last name is an optional field (?)
    // if(CheckValueNotEmpty(form.lastname.value) === false) {
    //     DisplayError("lastnameError", "Last name is a required field.");
    //     isValid = false;
    // }

    if(CheckValueNotEmpty(form.emailaddress.value) === false) {
        DisplayError("emailError", "Email is a required field.");
        isValid = false;
    } else if (CheckValidEmail(form.emailaddress.value) === false) {
        DisplayError("emailError", "Please use the correct format for an email address.");
        isValid = false;
    }

    if(CheckValueNotEmpty(form.password1.value) === false || CheckValueNotEmpty(form.password2.value) === false){
        DisplayError("passwordError", "Passwords are required fields.");
        isValid = false;
    } else {
        if (CheckPasswordsMatch(form.password1.value, form.password2.value) === false){
            DisplayError("passwordError", "Passwords do not match.");
            isValid = false;
        }
    }

    return isValid;
}

// Event handler to hide the error text on value changed.
function OnChangeElement(id) {
    document.getElementById(id).style.visibility = "hidden";
}

// Display error message text for an element id.
function DisplayError(errorID, errorMSG) {
    document.getElementById(errorID).textContent = errorMSG;
    document.getElementById(errorID).style.visibility = "visible";
}

// Check if value is not empty.
function CheckValueNotEmpty(value) {
    if(value !== ""){
        return true;
    }
    return false;
}

// Check if both pw1 and pw2 match.
function CheckPasswordsMatch(pwd1, pwd2) {
    if(pwd1 === pwd2){
        return true;
    }
    return false;
}

// Check if the email is valid.
function CheckValidEmail(email){
    //Regex obtained from: http://blog.gerv.net/2011/05/html5_email_address_regexp/
    var pattern = new RegExp("^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?)*$");
    if(pattern.test(email)) {
        return true;
    }
    return false;
}
