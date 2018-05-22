// Login using email and password.
function LoginForm(form) {
    isValid = true;

    if(CheckValueNotEmpty(form.emailaddress.value) === false) {
        DisplayError("emailError", "Email is a required field.");
        isValid = false;
    } else if (CheckValidEmail(form.emailaddress.value) === false) {
        DisplayError("emailError", "Please use the correct format for an email address.");
        isValid = false;
    } 

    if(CheckValueNotEmpty(form.password.value) === false){
        DisplayError("passwordError", "Password is a required field.");
        isValid = false;
    }

    if(LoginIsValid(form.emailaddress.value, form.password.value) === false){
        isValid = false;
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

// Check if the email is valid.
function CheckValidEmail(email) {
    //Regex obtained from: http://blog.gerv.net/2011/05/html5_email_address_regexp/
    var pattern = new RegExp("^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,253}[a-zA-Z0-9])?)*$");
    if(pattern.test(email)) {
        return true;
    }
    return false;
}

// Check if login information is valid (exists in database). Returns true for now.
function LoginIsValid(email, password) {
    return true;
}
