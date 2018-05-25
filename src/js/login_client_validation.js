// Login using email and password.
function ValidateLoginForm_Client(form) {
    var isValid = true;

    if(CheckValueNotEmpty(form.emailaddress.value) === false) {
        DisplayError("emailErrorID", "Email is a required field.");
        isValid = false;
    } else if (CheckValidEmail(form.emailaddress.value) === false) {
        DisplayError("emailErrorID", "Please use the correct format for an email address.");
        isValid = false;
    } 

    if(CheckValueNotEmpty(form.password.value) === false){
        DisplayError("passwordErrorID", "Password is a required field.");
        isValid = false;
    }

    return isValid;
}